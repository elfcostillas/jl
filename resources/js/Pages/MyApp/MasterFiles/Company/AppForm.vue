<template>
    <div>
        <div class="grid grid-cols-1 gap-4 m-2">
           
             <div>
                <label for="company_name" class="block text-gray-700">Company Name</label>
                <InputText v-model="form.company_name" id="company_name" class=" w-full" />
            </div>
             <div>
                <label for="company_shortname" class="block text-gray-700">Company Short Name</label>
                <InputText v-model="form.company_shortname" id="company_shortname" class=" w-full" />
            </div>
            <div>
                <label for="company_address" class="block text-gray-700">Company Address</label>
                <InputText v-model="form.company_address" id="company_address" class=" w-full" />
            </div>
            <div>
                <label for="company_status" class="block text-gray-700">Status</label>
                <Select v-model="form.company_status" :options="statuses" option-label="name" option-value="value" class="w-full " />
            </div>
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
    import { onMounted, ref } from "vue";

    const statuses = ref([
        { value : 'ACTIVE', name : 'Active' },
        { value : 'INACTIVE', name : 'Inactive' },
    ]);

    onMounted(() => {
    
        form.value = {
            id : props.selectedCompany?.id ?? null,
            company_name : props.selectedCompany?.company_name ?? null,
            company_address : props.selectedCompany?.company_address ?? null,
            company_status : props.selectedCompany?.company_status ?? null,
            company_shortname : props.selectedCompany?.company_shortname ?? null, 
        };

        console.log(form.value);
    });

    const props = defineProps([
        'selectedCompany'
    ]);

    const form = ref({
        id : null,
        company_name : null,
        company_address : null,
        company_status : null,
        company_shortname : null,
    });

    const emit = defineEmits([
        'save'
    ]);

    const save = () => {
        emit('save', form.value);
    }


</script>

<style lang="css" scoped>

</style>