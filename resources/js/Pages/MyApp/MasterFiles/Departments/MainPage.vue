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

    import useConfirmSave from '@/composables/useConfirmSave.js';
    const { confirmAndSave } = useConfirmSave();

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
        console.log(formData);
        confirmAndSave({
            data : formData,
            url: `/master-files/departments/${formData.id ? 'update' : 'create'}`,
            onSuccess: () => {
                router.reload({
                    only: ['departments'],
                    preserveScroll: true,
                    preserveState: true
                });
            },
            
        });
    };
    
</script>

<style lang="css" scoped>

</style>