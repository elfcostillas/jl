<template>
    <div>
        <AppLayout>
            <template #nav>
                <NavBar/>
            </template>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Departments
                </h2>
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
                <Dialog v-model:visible="isVisible" modal header="Department Information" :style="{ width: '28rem',}">
                    <AppForm 
                        :selectedDepartment="selectedDepartment"
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

    const selectedDepartment = ref();
    const isVisible = ref(false);
    const loading = ref(false);

    const confirmDialog = useConfirm();
    const toast = useToast();

    onMounted(() => {
        // if(listboxItems.value.length > 0){
        //     selectedItem.value = listboxItems.value[0];
        //     listBoxItemChange(selectedItem.value);
        // }
    });

    const data = computed(() => {
        return props.departments.map(item => ({
            ...item,
         
        }));
    });

    const cols = ref([
        { field: 'id', header: 'ID' },
        { field: 'dept_code', header: 'Department Code' },
        { field: 'dept_name', header: 'Department Name' },
        { 
            field : 'actions',
            header : 'Actions',
            type : 'actions',
            buttons : ['edit']
        }
    ]);

    const create = () => {
        selectedDepartment.value = {
            id : null,
            dept_code : null,
            dept_name : null,
          
        };

        showDialog();
    };

    const showDialog = () => {
        isVisible.value = true;
    }

    const edit = (data) => {
        selectedDepartment.value = data;
        showDialog();
    };

    const props = defineProps([
        'departments',
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
            
                await postFN(`/master-files/departments/${mode}`, formData)
                .then(response => {
                    toast.add({ severity: 'success', summary: 'Success', detail: response.data.message, life: 3000 });
                    // isVisible.value = false;

                    router.reload({
                        only: ['departments'],
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