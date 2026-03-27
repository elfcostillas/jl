<template>
   <div>
        <div class="grid grid-cols-1 gap-4 m-2">
            <div>
                <label for="dept_id" class="block text-gray-700">Department</label>
                <Select v-model="form.dept_id" :options="props.departments" option-label="dept_name" option-value="id" id="dept_id" class=" w-full" />
            </div>
            <div>
                <label for="job_title_code" class="block text-gray-700">Job Title Code</label>
                <InputText v-model="form.job_title_code" id="job_title_code" class=" w-full" />
            </div>
            <div>
                <label for="job_title_name" class="block text-gray-700">Job Title Name</label>
                <InputText v-model="form.job_title_name" id="job_title_name" class=" w-full" />
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

    import { ref,onMounted } from "vue";

    onMounted(() => {
    
        form.value = {
            id : props.selectedJobTitle?.id ?? null,
            dept_id : props.selectedJobTitle?.dept_id ?? null,
            job_title_code : props.selectedJobTitle?.job_title_code ?? null,
            job_title_name : props.selectedJobTitle?.job_title_name ?? null,
        };

        // console.log(form.value);
    });

    const props = defineProps([
        'selectedJobTitle',
        'departments'
    ]);


    const form = ref({
        id : null,
        dept_id : null,
        job_title_code : null,
        job_title_name : null,
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