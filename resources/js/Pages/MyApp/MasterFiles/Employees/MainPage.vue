<template>
    <div>
        <AppLayout>
            <template #nav>
                <NavBar/>
            </template>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Employees
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
                <Dialog v-model:visible="isVisible" modal header="Employee Information" :style="{ width: '72rem',}">
                    <AppForm 
                        :selectedEmployee="selectedEmployee"
                        :boolean_options="props.boolean_options"
                        :employee_statuses="props.employee_statuses"
                        :civil_status="props.civil_status"
                        :company="props.company"

                        @save="save"
                        @companyChange="companyChange"
                        @departmentChange="departmentChange"
                    />  
                    <ConfirmDialog></ConfirmDialog>
                    <Toast></Toast>
                </Dialog>
            </template>
            <template #footer>
                <p>
                {{ props.civil_status }}
                {{ props.company }}
                </p>
            </template>
        </AppLayout>
    </div>
</template>

<script setup>
    import { ref,onMounted,computed } from 'vue';
    import { router } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import NavBar from "@/Pages/Navigation/NavBar.vue";
    import AppForm from './AppForm.vue';
    import DataTable from "@/Layouts/DataTableTemplate.vue";

    import useConfirmSave from '@/composables/useConfirmSave.js';

    const { confirmAndSave } = useConfirmSave();

    // const listboxItems = computed(() => {
    //     return props.company || [];
    // });

    const listboxItems = ref([{value : 0, company_shortname : 'All'}]);

    const selectedItem = ref(null);
    const isVisible = ref(false);
    const loading = ref(false);

    const selectedEmployee = ref();

    onMounted(() => {
        listboxItems.value.push(...props.company);

        if(listboxItems.value.length > 0){
            selectedItem.value = listboxItems.value[0];
            listBoxItemChange(selectedItem.value);
        }
    });

    const listBoxItemChange = (item) => {
        if(item != null)
        {
            router.get(route('employees.index'), {
                company_search: item.id
            }, {
                only: ['employees'],
                preserveScroll: true,
                preserveState: true
            })
        }
    }

    const create = () => {
        selectedEmployee.value = {
            id : null,
            firstname : null,
            lastname : null,
            middlename : null,
            suffixname : null,
            primary_addr : null,
            secondary_addr : null,
            civil_status : null,
            gender : null,
            birthdate : null,
            blood_type : null,
            contact_no : null,
            email : null,
            biometric_id : null,
            emergency_person : null,
            emergency_relation : null,
            emergency_phone : null,
        };

        showDialog();
    };

    const edit = (employee) => {

        selectedEmployee.value = employee;
        showDialog();
    };

    const props = defineProps([
        'company',
        'employees',
        'boolean_options',
        'employee_statuses',
        'civil_status',
        'company'
    ]);

    const cols = ref([
        { field: 'id', header: 'ID' },
        { field: 'company_name', header: 'Company Name' },
        { field: 'location_name', header: 'Location Name' },
        { field: 'lastname', header: 'Last Name' },
        { field: 'firstname', header: 'First Name' },
        { field: 'middlename', header: 'Middle Name' },
        { field: 'estatus_desc', header: 'Employment Status' },
        { field: 'exit_status_desc', header: 'Exit Status' },
        { 
            field : 'actions',
            header : 'Actions',
            type : 'actions',
            buttons : ['edit']
        }
    ]);

    const showDialog = () => {
        isVisible.value = true;
    }

    const data = computed(() => {
        return props.employees?.map(item => ({
            ...item,
            company_name : item.company ? item.company.company_name : '',
            location_name : item.site_location ? item.site_location.location_name : '',
            exit_status_desc : item.exit_status ? item.exit_status.status_desc : '',
            estatus_desc : item.employee_status ? item.employee_status.estatus_desc : ''
        }));
    });

    const companyChange = (e) => {
        // selectedEmployee.value.company_id = e.value;
        console.log(e);
    };

    const departmentChange = (e) => {
        // selectedEmployee.value.department_id = e.value;
        console.log(e);
    };
    departmentChange

    
</script>

<style lang="css" scoped>

</style>