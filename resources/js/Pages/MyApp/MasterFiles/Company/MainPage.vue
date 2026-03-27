<template>
    <div>
        <AppLayout>
            <template #nav>
                <NavBar/>
            </template>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Company
                </h2>
            </template>
            <template #main>
                 <DataTable :data="data" :cols="cols" :loading="loading" @create="create" @edit="edit"  />
            </template>
            <template #dialog>
               
                <Dialog v-model:visible="isVisible" modal header="Company Information" :style="{ width: '26rem',}">
                    <AppForm 
                        :selectedCompany="selectedCompany"
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
    // import DataTable from '@/Components/DataTable.vue';
    import AppForm from './AppForm.vue';
    import DataTable from "@/Layouts/DataTableTemplate.vue";

    import { postFN } from '@/api/transmit.js';
    import { useConfirm } from 'primevue';
    import { useToast } from "primevue/usetoast";

    import useConfirmSave from '@/composables/useConfirmSave.js';
    const { confirmAndSave } = useConfirmSave();

    const selectedCompany = ref();
    const isVisible = ref(false);
    const loading = ref(false);

    const confirmDialog = useConfirm();
    const toast = useToast();

    // Props
    const props = defineProps([
        'company'
    ]);

    // Datatable data
    const data = computed(() => {
        return props.company;
    });

    // Datatable Columns
    const cols = ref([
        { field: 'id', header: 'ID' },
        { field: 'company_name', header: 'Company Name' },
        { field: 'company_shortname', header: 'Company Short Name' },
        { field: 'company_address', header: 'Company Address' },
        { field: 'company_status', header: 'Company Status' },
        { 
            field : 'actions',
            header : 'Actions',
            type : 'actions',
            buttons : ['edit']
        }
    ]);

    // Actions
    
    const create = () => {
        selectedCompany.value = {
            id: null,
            company_name: null,
            company_address: null,
            company_status: null,
            company_shortname: null
        };

        showDialog();
    };

    const edit = (data) => {
        selectedCompany.value = data;
        showDialog();
    };

    const showDialog = () => {
        isVisible.value = true;
    }

    const save = async (formData) => {
        console.log(formData);
        confirmAndSave({
            data : formData,
            url: `/master-files/company/${formData.id ? 'update' : 'create'}`,
            onSuccess: () => {
                router.reload({
                    only: ['company'],
                    preserveScroll: true,
                    preserveState: true
                });
            },
            
        });
    };

    
</script>

<style lang="css" scoped>

</style>