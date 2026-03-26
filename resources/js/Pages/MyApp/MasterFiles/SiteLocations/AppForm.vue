<template>
    <div>
        <div class="grid grid-cols-1 gap-4 m-2">
            <div>
                <label for="company_id" class="block text-gray-700">Company</label>
                <Select v-model="form.company_id" :options="props.company" option-label="company_name" option-value="id" id="company_id" class=" w-full" />
            </div>
            <div>
                <label for="location_name" class="block text-gray-700">Location Name</label>
                <InputText v-model="form.location_name" id="location_name" class=" w-full" />
            </div>
            <div>
                <label for="location_address" class="block text-gray-700">Location Address</label>
                <InputText v-model="form.location_address" id="location_address" class=" w-full" />
            </div>
            <div>
                <label for="location_status" class="block text-gray-700">Location Status</label>
                <Select v-model="form.location_status" :options="locationStatusOptions" option-label="name" option-value="value" id="location_status" class=" w-full" />
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

    const locationStatusOptions = ref([
        { value : 'ACTIVE', name : 'Active' },
        { value : 'INACTIVE', name : 'Inactive' },
    ]);

    onMounted(() => {
    
        form.value = {
            id : props.selectedSiteLocation?.id ?? null,
            company_id : props.selectedSiteLocation?.company_id ?? null,
            location_name : props.selectedSiteLocation?.location_name ?? null,
            location_address : props.selectedSiteLocation?.location_address ?? null,
            location_status : props.selectedSiteLocation?.location_status ?? null,
        };

        // console.log(form.value);
    });


    const props = defineProps([
        'selectedSiteLocation',
        'company'
    ]);

    const form = ref({
        id : null,
        company_id : null,
        location_name : null,
        location_address : null,
        location_status : null,
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