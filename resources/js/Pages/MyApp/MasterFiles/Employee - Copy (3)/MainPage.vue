<template>
    <div>
        <AppLayout>
            <template #header>
                <NavBar></NavBar>
            </template>

            <template #default>
                <DataTable 
                    :data="props.companies" 
                    :columns="['id', 'name', 'address', 'contact_number']"
                    @edit="edit"
                    @create="create"
                />
                <Dialog v-model:visible="isVisible" header="Company Form" modal :closable="false" :style="{width: '50vw'}">
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
    import AppLayout from '@/Layouts/AppLayout.vue';
    import NavBar from "@/Pages/Navigation/NavBar.vue";
    // import DataTable from '@/Components/DataTable.vue';
    import AppForm from './AppForm.vue';
</script>

<style lang="css" scoped>

</style>