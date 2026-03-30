<template>
    <div>
        <Fieldset legend="Personal Information" class="mb-2">   
            <div class="grid grid-cols-4 gap-3 m-2">
                <div>
                    <label for="lastname" class="block text-gray-700">Last Name</label>
                    <InputText v-model="form.lastname" id="lastname" class=" w-full" />
                </div>
                <div>
                    <label for="firstname" class="block text-gray-700">First Name</label>
                    <InputText v-model="form.firstname" id="firstname" class=" w-full" />
                </div>
                <div>
                    <label for="middlename" class="block text-gray-700">Middle Name</label>
                    <InputText v-model="form.middlename" id="middlename" class=" w-full" />
                </div>
                <div>
                    <label for="suffixname" class="block text-gray-700">Suffix Name</label>
                    <InputText v-model="form.suffixname" id="suffixname" class=" w-full" />
                </div>
                <div class="col-span-2">
                    <label for="primary_addr" class="block text-gray-700">Primary Address</label>
                    <InputText v-model="form.primary_addr" id="primary_addr" class=" w-full" />
                </div>
                <div class="col-span-2">
                    <label for="secondary_addr" class="block text-gray-700">Secondary Address</label>
                    <InputText v-model="form.secondary_addr" id="secondary_addr" class=" w-full" />
                </div>
                <div>
                    <label for="civil_status" class="block text-gray-700">Civil Status</label>
                    <Select v-model="form.civil_status" id="civil_status" class=" w-full" />
                </div>
                <div>
                    <label for="gender" class="block text-gray-700">Gender</label>
                    <InputText v-model="form.gender" id="gender" class=" w-full" />
                </div>
                <div>
                    <label for="birthdate" class="block text-gray-700">Birth Date</label>
                    <DatePicker v-model="form.birthdate" id="birthdate" showIcon class=" w-full" />
                </div>
                <div>
                    <label for="blood_type" class="block text-gray-700">Blood Type</label>
                    <InputText v-model="form.blood_type" id="blood_type" class=" w-full" />
                </div>
                <div>
                    <label for="contact_no" class="block text-gray-700">Contact Number</label>
                    <InputText v-model="form.contact_no" id="contact_no" class=" w-full" />
                </div>
                <div>
                    <label for="email" class="block text-gray-700">Email</label>
                    <InputText v-model="form.email" id="email" class=" w-full" />
                </div>
                <div  class="col-span-4"> 
                    <Fieldset legend="Emergency Contact Information">
                        <!-- <div  class="col-span-4 mb-2">  -->
                        <div class="grid grid-cols-3 gap-3 m-2">
                            <div>
                                <label for="emergency_person" class="block text-gray-700">Name</label>
                                <InputText v-model="form.emergency_person" id="emergency_person" class=" w-full" />
                            </div>
                            <div>
                                <label for="emergency_relation" class="block text-gray-700">Relationship</label>
                                <InputText v-model="form.emergency_relation" id="emergency_relation" class=" w-full" />
                            </div>
                            <div>
                                <label for="emergency_phone" class="block text-gray-700">Contact Number</label>
                                <InputText v-model="form.emergency_phone" id="emergency_phone" class=" w-full" />
                            </div>
                        </div>
                    </Fieldset>
                </div>
            </div>
        </Fieldset>   
        <Fieldset legend="Employment Information" class="mb-3">   
            <div class="grid grid-cols-4 gap-3 m-2">
                <div>
                    <label for="company_id" class="block text-gray-700">Company</label>
                    <Select v-model="form.company_id" id="company_id" class=" w-full" />
                </div>
                <div>
                    <label for="location_id" class="block text-gray-700">Location</label>
                    <Select v-model="form.location_id" id="location_id" class=" w-full" />
                </div>
                <div>
                    <label for="dept_id" class="block text-gray-700">Department</label>
                    <Select v-model="form.dept_id" id="dept_id" class=" w-full" />
                </div>
                <div>
                    <label for="job_title_id" class="block text-gray-700">Job Title</label>
                    <Select v-model="form.job_title_id" id="job_title_id" class=" w-full" />
                </div>
                <div>
                    <label for="employee_status" class="block text-gray-700">Employement Status</label>
                    <Select v-model="form.employee_status" id="employee_status" class=" w-full" />
                </div>
                <div>
                    <label for="emp_level" class="block text-gray-700">Employee Level</label>
                    <Select v-model="form.emp_level" id="emp_level" class=" w-full" />
                </div>
                <div>
                    <label for="date_hired" class="block text-gray-700">Date Hired</label>
                    <DatePicker v-model="form.date_hired" id="date_hired" showIcon class=" w-full" />
                </div>
                <div>
                    <label for="date_regularized" class="block text-gray-700">Date Regularized</label>
                    <DatePicker v-model="form.date_regularized" id="date_regularized" showIcon class=" w-full" />
                </div>
                <div>
                    <label for="exit_date" class="block text-gray-700">Exit Date</label>
                    <DatePicker v-model="form.exit_date" id="exit_date" showIcon class=" w-full" />
                </div>
                <div>
                    <label for="exit_status_id" class="block text-gray-700">Exit Status</label>
                    <Select v-model="form.exit_status_id" id="exit_status_id" class=" w-full" />
                </div>
                
               
            </div>
        </Fieldset>   
        <Fieldset legend="Government IDs" class="mb-3">   
            <div class="grid grid-cols-4 gap-3 m-2">
                <div>
                    <label for="sss_no" class="block text-gray-700">SSS Number</label>
                    <InputText v-model="form.sss_no" id="sss_no" class=" w-full" />
                </div>
                <div>
                    <label for="tin_no" class="block text-gray-700">TIN Number</label>
                    <InputText v-model="form.tin_no" id="tin_no" class=" w-full" />
                </div>
                <div>
                    <label for="phic_no" class="block text-gray-700">PhilHealth Number</label>
                    <InputText v-model="form.phic_no" id="phic_no" class=" w-full" />
                </div>
                <div>
                    <label for="hdmf_no" class="block text-gray-700">Pag-IBIG Number</label>
                    <InputText v-model="form.hdmf_no" id="hdmf_no" class=" w-full" />
                </div>
                <div>
                    <label for="deduct_sss" class="block text-gray-700">Deduct SSS</label>
                    <Select v-model="form.deduct_sss" id="deduct_sss" class=" w-full" :options="boolean_options" optionLabel="opt_label" optionValue="opt_value" />
                </div>
                <div>
                    <label for="deduct_wtax" class="block text-gray-700">Deduct Withholding Tax</label>
                    <Select v-model="form.deduct_wtax" id="deduct_wtax" class=" w-full" :options="boolean_options" optionLabel="opt_label" optionValue="opt_value" />
                </div>
                <div>
                    <label for="deduct_phic" class="block text-gray-700">Deduct PhilHealth</label>
                    <Select v-model="form.deduct_phic" id="deduct_phic" class=" w-full" :options="boolean_options" optionLabel="opt_label" optionValue="opt_value" />
                </div> 

                <div>
                    <label for="hdmf_contri" class="block text-gray-700">Pag-IBIG Contribution</label>
                    <InputText v-model="form.hdmf_contri" id="hdmf_contri" class=" w-full" />
                </div>
               
            </div>  
        </Fieldset>

         <Fieldset legend="Compensations" class="mb-3">   
             <div class="grid grid-cols-4 gap-3 m-2">
                <div>
                    <label for="pay_type" class="block text-gray-700">Pay Type</label>
                    <Select v-model="form.pay_type" id="pay_type" class=" w-full" />
                </div>
                <div>
                    <label for="release_type" class="block text-gray-700">Release Type</label>
                    <Select v-model="form.release_type" id="release_type" class=" w-full" />
                </div>
                <div>
                    <label for="daily_allowance" class="block text-gray-700">Daily Allowance</label>
                    <InputText v-model="form.daily_allowance" id="daily_allowance" class=" w-full" />
                </div>
                <div>
                    <label for="monthly_allowance" class="block text-gray-700">Monthly Allowance</label>
                    <InputText v-model="form.monthly_allowance" id="monthly_allowance" class=" w-full" />
                </div>
              
                <div>
                    <label for="bank_acct" class="block text-gray-700">Bank Account</label>
                    <InputText v-model="form.bank_acct" id="bank_acct" class=" w-full" />
                </div>
                <div>
                    <label for="basic_salary" class="block text-gray-700">Basic Salary</label>
                    <InputText v-model="form.basic_salary" id="basic_salary" class=" w-full" />
                </div>
                <div>
                    <label for="is_mwe" class="block text-gray-700">Minimum Wage Employee</label>
                    <Select v-model="form.is_mwe" id="is_mwe" class=" w-full" :options="boolean_options" optionLabel="opt_label" optionValue="opt_value" />
                </div>
                 <div>
                    <label for="is_fixed" class="block text-gray-700">Is Fixed</label>
                    <Select v-model="form.is_fixed" id="is_fixed" class=" w-full" :options="boolean_options" optionLabel="opt_label" optionValue="opt_value" />
                </div>
            </div>
        </Fieldset>
        <div class="grid grid-cols-4 gap-3 m-0">
            <div>
                <Button
                icon="pi pi-save"
                label="Save"
                @click="save">

                </Button>
            </div>
        </div>
    </div>
    
</template>

<script setup>
    import { ref, onMounted} from "vue";

    const form = ref({
        id : null,
        firstname : null,
        lastname : null,
        middlename : null,
        suffixname : null,
        location_id : null,
        dept_id : null,
        job_title_id : null,
        employee_status : null,
        emp_level : null,
        date_hired : null,
        date_regularized : null,
        exit_date : null,
        exit_status_id : null,  
        primary_addr : null,
        secondary_addr : null,

        civil_status : null,
        gender : null,
        birthdate : null,
        blood_type : null,
        contact_no : null,
        email : null,
        // biometric_id : null,
        emergency_person : null,
        emergency_relation : null,
        emergency_phone : null,

        company_id : null,

        sss_no: null,
        deduct_sss: null,
        tin_no: null,
        phic_no: null,
        deduct_phic: null,
        hdmf_no: null,
        deduct_hdmf: null,
        hdmf_contri: null,
        deduct_wtax: null,
        basic_salary: null,
    });

    const props = defineProps([
        'selectedEmployee',
        'boolean_options'
        // 'company',
        // 'location',
        // 'department',
        // 'jobTitle',
        // 'exitStatus',
    ]);

    onMounted(() => {
        form.value = {
            id : props.selectedEmployee?.id ?? null,
            firstname : props.selectedEmployee?.firstname ?? null,
            lastname : props.selectedEmployee?.lastname ?? null,
            middlename : props.selectedEmployee?.middlename ?? null,
            suffixname : props.selectedEmployee?.suffixname ?? null,
            location_id : props.selectedEmployee?.location_id ?? null,
            dept_id : props.selectedEmployee?.dept_id ?? null,
            job_title_id : props.selectedEmployee?.job_title_id ?? null,
            employee_status : props.selectedEmployee?.employee_status ?? null,
            emp_level : props.selectedEmployee?.emp_level ?? null,
            date_hired : props.selectedEmployee?.date_hired ?? null,
            date_regularized : props.selectedEmployee?.date_regularized ?? null,
            exit_date : props.selectedEmployee?.exit_date ?? null,
            exit_status_id : props.selectedEmployee?.exit_status_id ?? null,  
            primary_addr : props.selectedEmployee?.primary_addr ?? null,
            secondary_addr : props.selectedEmployee?.secondary_addr ?? null,

            civil_status : props.selectedEmployee?.civil_status ?? null,    
            gender : props.selectedEmployee?.gender ?? null,
            birthdate : props.selectedEmployee?.birthdate ?? null,
            blood_type : props.selectedEmployee?.blood_type ?? null,
            contact_no : props.selectedEmployee?.contact_no ?? null,
            email : props.selectedEmployee?.email ?? null,
            // biometric_id : null,
            emergency_person : props.selectedEmployee?.emergency_person ?? null,
            emergency_relation : props.selectedEmployee?.emergency_relation ?? null,
            emergency_phone : props.selectedEmployee?.emergency_phone ?? null,

            company_id : props.selectedEmployee?.company_id ?? null,

            sss_no: props.selectedEmployee?.sss_no ?? null,
            deduct_sss: props.selectedEmployee?.deduct_sss ?? null,
            tin_no: props.selectedEmployee?.tin_no ?? null,
            phic_no: props.selectedEmployee?.phic_no ?? null,
            deduct_phic: props.selectedEmployee?.deduct_phic ?? null,
            hdmf_no: props.selectedEmployee?.hdmf_no ?? null,
            deduct_hdmf: props.selectedEmployee?.deduct_hdmf ?? null,
            hdmf_contri: props.selectedEmployee?.hdmf_contri ?? null,
            deduct_wtax: props.selectedEmployee?.deduct_wtax ?? null,
            basic_salary: props.selectedEmployee?.basic_salary ?? null,
            is_mwe: props.selectedEmployee?.is_mwe ?? null,
            is_fixed: props.selectedEmployee?.is_fixed ?? null,
        }
    });

    const emit = defineEmits([
        'save',
        'companyChange',
        'departmentChange',
    ]);

    const companyChange = (e) => {
        emit('companyChange', e);
    };

    const departmentChange = (e) => {
        emit('departmentChange', e);
    };

</script>

<style lang="css" scoped>

</style>