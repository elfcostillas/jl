<template>
    <div>
        <div class="grid grid-cols-1 gap-4 m-2">
            <div>
                <label for="dept_code" class="block text-gray-700">Department Code</label>
                <InputText v-model="form.dept_code" id="dept_code" class=" w-full" />
            </div>
             <div>
                <label for="dept_name" class="block text-gray-700">Department Name</label>
                <InputText v-model="form.dept_name" id="dept_name" class=" w-full" />
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
    import { onMounted, ref } from 'vue';

    onMounted(() => {
        form.value = {
            id : props.selectedDepartment?.id ?? null,
            dept_code : props.selectedDepartment?.dept_code ?? null,
            dept_name : props.selectedDepartment?.dept_name ?? null, 
        };

        // console.log(form.value);
    });

    const form = ref({
        dept_code: null,
        dept_name: null
    });

    const props = defineProps([
        'selectedDepartment'
    ]);

    const emit = defineEmits([
        'save'
    ]);

    const save = () => {
        emit('save', form.value);
    };
</script>

<style lang="css" scoped>

</style>