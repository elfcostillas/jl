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
            <template #main>
                <DataTable /> 
            </template>
        </AppLayout>

    </div>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import NavBar from "@/Pages/Navigation/NavBar.vue";
    // import DataTable from '@/Components/DataTable.vue';
    import AppForm from './AppForm.vue';
    import DataTable from "@/Layouts/DataTableTemplate.vue";
    
</script>

<style lang="css" scoped>

</style>