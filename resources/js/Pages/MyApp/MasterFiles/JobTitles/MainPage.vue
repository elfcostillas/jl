<template>
    <div>
        <AppLayout>
            <template #nav>
                <NavBar/>
            </template>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Job Titles
                </h2>
            </template>
            <template #section>
                <div>
                    <Listbox :options="listboxItems" 
                        
                        v-model="selectedItem" 
                        optionLabel="dept_code"  listStyle="height:250px;max-height:42rem;min-height:42rem;"
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
                <div>
                    <Dialog v-model:visible="isVisible" modal header="Job Titles Information" :style="{ width: '28rem',}">
                        <AppForm 
                            :selectedJobTitle="selectedJobTitle"
                            :departments="props.departments"
                            @save="save"
                        />  
                        <ConfirmDialog></ConfirmDialog>
                        <Toast></Toast>
                    </Dialog>
                </div>
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

    const confirmDialog = useConfirm();
    const toast = useToast();

    const listboxItems = computed(() => {
        return props.departments || [];
    });

    const selectedJobTitle = ref();

    const selectedItem = ref();
    const isVisible = ref(false);   
    
    /* Listbox data*/
    
    onMounted(() => {
        if(listboxItems.value.length > 0){
            selectedItem.value = listboxItems.value[0];
            listBoxItemChange(selectedItem.value);
        }
    });

    const data = computed(() => {
        return props.jobTitles.map(item => ({
            ...item,
            dept_name : item.department ? item.department.dept_name : ''
        }));
    });

    const showDialog = () => {
        isVisible.value = true;
    }

    const create = () => {
        selectedJobTitle.value = {
            id : null,
            dept_id : null,
            job_title_code : null,
            job_title_name : null,
        };
        showDialog();
    }

    const edit = (data) => {
        selectedJobTitle.value = data;
        showDialog();
    };


    const listBoxItemChange = (item) => {
        if(item != null)
        {
            router.get(route('job-titles.index'), {
                search: item.id
            }, {
                only: ['jobTitles'],
                preserveScroll: true,
                preserveState: true
            })
        }
    }

    const cols = ref([
        { field: 'id', header: 'ID' },
        { field: 'dept_name', header: 'Department Name' },
        { field: 'job_title_code', header: 'Job Title Code' },
        { field: 'job_title_name', header: 'Job Title Name' },
        { 
            field : 'actions',
            header : 'Actions',
            type : 'actions',
            buttons : ['edit']
        }
    ]);

    const props = defineProps([
        'departments',
        'jobTitles',
    ]);

    const save = async (formData) => {
        console.log(formData);
        confirmAndSave({
            data : formData,
            url: `/master-files/job-titles/${formData.id ? 'update' : 'create'}`,
            onSuccess: () => {
                router.reload({
                    only: ['jobTitles'],
                    preserveScroll: true,
                    preserveState: true
                });
            },
            
        });
    };
    
</script>

<style lang="css" scoped>

</style>