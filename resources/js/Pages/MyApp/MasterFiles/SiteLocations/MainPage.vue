<template>
    <div>
        <AppLayout>
            <template #nav>
                <NavBar/>
            </template>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Site Locations
                </h2>
            </template>
            <template #section>
                <div >
                    <Listbox :options="listboxItems" 
                        filter 
                        v-model="selectedItem" 
                        optionLabel="company_shortname"  listStyle="height:250px;max-height:42rem;min-height:42rem;"
                        @update:modelValue="listBoxItemChange"
                    />
                </div>
            </template>
            <template #main>
                <DataTable 
                    :data="data"
                    :cols="cols"
                    :loading="false"

                    @edit="edit"
                    @create="create"
                />       

            </template>
        </AppLayout>

    </div>
</template>

<script setup>
    import { ref,onMounted,computed } from 'vue';
    import { router } from '@inertiajs/vue3';
    
    import AppLayout from '@/Layouts/AppLayout.vue';
    import NavBar from "@/Pages/Navigation/NavBar.vue";
    import DataTable from "@/Layouts/DataTableTemplate.vue";

    import { postFN } from '@/api/transmit.js';
    import { useConfirm } from 'primevue';
    import { useToast } from "primevue/usetoast";

    /* Listbox data*/
    const listboxItems = computed(() => {
        return props.company || [];
    });

    const selectedItem = ref(null);

    const listBoxItemChange = (item) => {
        if(item != null)
        {
            router.get(route('site-locations.index'), {
                search: item.id
            }, {
                only: ['sites'],
                preserveScroll: true,
                preserveState: true
            })
        }
    }

    onMounted(() => {
        if(listboxItems.value.length > 0){
            selectedItem.value = listboxItems.value[0];
            listBoxItemChange(selectedItem.value);
        }
    });

    const data = computed(() => {
        return props.sites.map(item => ({
            ...item,
            company_name : item.company ? item.company.company_name : ''
        }));
    });

    const cols = ref([
        { field: 'id', header: 'ID' },
        { field: 'company_name', header: 'Company Name' },
        { field: 'location_name', header: 'Location Name' },
        { field: 'location_address', header: 'Location Address' },
        { field: 'location_status', header: 'Location Status' },
        { 
            field : 'actions',
            header : 'Actions',
            type : 'actions',
            buttons : ['edit']
        }
    ]);


    const props = defineProps([
        'company',
        'sites',
    ]);

</script>

<style lang="css" scoped>

</style>