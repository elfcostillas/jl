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
            <template #dialog>
               
                <Dialog v-model:visible="isVisible" modal header="Site Location Information" :style="{ width: '28rem',}">
                    <AppForm 
                        :selectedSiteLocation="selectedSiteLocation"
                        :company="props.company"
                        @save="save"
                    />  
                    <ConfirmDialog></ConfirmDialog>
                    <Toast></Toast>
                </Dialog>
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
    import AppForm from './AppForm.vue';

    import { postFN } from '@/api/transmit.js';
    import { useConfirm } from 'primevue';
    import { useToast } from "primevue/usetoast";

    /* Listbox data*/
    const listboxItems = computed(() => {
        return props.company || [];
    });

    const isVisible = ref(false);
    const loading = ref(false);

    const selectedItem = ref(null);

    const selectedSiteLocation = ref(null);

    const confirmDialog = useConfirm();
    const toast = useToast();

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

    const create = () => {
        selectedSiteLocation.value = {
           id : null,
            company_id : null,
            location_name : null,
            location_address : null,
            location_status :  'ACTIVE',
        };

        showDialog();
    };

    const edit = (data) => {
        selectedSiteLocation.value = data;
        showDialog();
    };

    const showDialog = () => {
        isVisible.value = true;
    }

    const props = defineProps([
        'company',
        'sites',
    ]);

    const save = async (formData) => {
        confirmDialog.require({
            message: 'Are you sure you want to proceed?',
            header: 'Confirmation',
            icon: 'pi pi-exclamation-triangle',
            rejectProps: {
                label: 'Cancel',
                severity: 'secondary',
                outlined: true
            },
            acceptProps: {
                label: 'Save',
                icon : 'pi pi-save',
                
            },
            accept: async () => {

                let mode = formData.id === null ? 'create' : 'update';
            
                await postFN(`/master-files/site-locations/${mode}`, formData)
                .then(response => {
                    toast.add({ severity: 'success', summary: 'Success', detail: response.data.message, life: 3000 });
                    // isVisible.value = false;

                    router.reload({
                        only: ['sites'],
                        preserveScroll: true,
                        preserveState: true
                    });

                    return response;

                })
                .catch(error => {
                    let message = '';

                    // console.log(error.response.data.errors);

                    Object.keys(error.response.data.errors).forEach(field => {
                        error.response.data.errors[field].forEach(msg => {
                            message += `${msg}\n`;
                        })
                    });

                    toast.add({ severity: 'error', summary: 'Error', detail: message || 'An error occurred', life: 3000 });
                });

                // toast.add({ severity: 'info', summary: 'Confirmed', detail: 'You have accepted', life: 3000 });
            },
            reject: () => {
                toast.add({ severity: 'error', summary: 'Rejected', detail: 'You have rejected', life: 3000 });
            }
        });
    };




</script>

<style lang="css" scoped>

</style>