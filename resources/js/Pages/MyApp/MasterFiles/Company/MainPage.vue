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
            
                await postFN(`/master-files/company/${mode}`, formData)
                .then(response => {
                    toast.add({ severity: 'success', summary: 'Success', detail: response.data.message, life: 3000 });
                    // isVisible.value = false;

                    router.reload({
                        only: ['company'],
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