<template>
    <div>
        <div class="grid grid-cols-3 gap-4 m-2">
            <div>
                <label for="veh_type" class="block text-gray-700">Vehicle Group</label>
                <Select v-model="form.veh_type" :options="props.vehicleTypes" option-label="name" option-value="value" class="w-full " />
            </div>
    
            <div>
                <label for="veh_code" class="block text-gray-700">Vehicle Code</label>
                <InputText v-model="form.veh_code" id="veh_code" class=" w-full" />
            </div>
            <div></div>

            <div>
                <label for="manufacturer_id" class="block text-gray-700">Manufacturer</label>
                <Select v-model="form.manufacturer_id" :options="props.manufacturers" option-label="name" option-value="value" class="w-full " />
            
            </div>
            <div>
                <label for="model" class="block text-gray-700">Make / Model</label>
                <InputText v-model="form.model" id="model" class=" w-full" />
            </div>
            <div>
                <label for="manufacture_year" class="block text-gray-700">Year</label>
                <InputNumber v-model="form.manufacture_year" id="manufacture_year" :min=1900 :max=2999 :useGrouping="false" class="w-full " />
            </div>
            <div>
                <label for="plate_no" class="block text-gray-700">Plate No.</label>
                <InputText v-model="form.plate_no" id="plate_no" class=" w-full" />
            </div>
            <div>
                <label for="veh_identification_no" class="block text-gray-700"> V.I.N. / Chasis No.</label>
                <InputText v-model="form.veh_identification_no" id="veh_identification_no" class=" w-full" />
            </div>
            <div>
                <label for="veh_color" class="block text-gray-700">Color</label>
                <InputText v-model="form.veh_color" id="veh_color" class=" w-full" />
            </div>
            <div class="col-span-2 ">
                <label for="supplier" class="block text-gray-700">Supplier</label>
                <Select v-model="form.supplier_id" filter :options="props.suppliers" option-label="supplier_name" option-value="id" class="w-full ">
                    <template #option="slotProps">
                        <div>
                            {{ slotProps.option.supplier_code }} - {{ slotProps.option.supplier_name }}
                        </div>
                    </template>
                </Select>
            </div>
            <div>
                <label for="purchase_date" class="block text-gray-700">Purchase Date</label>
                <DatePicker v-model="form.purchase_date" showIcon id="purchase_date" class=" w-full" />
            </div>
            <div>
                <label for="assigned_to" class="block text-gray-700">Assigned To</label>
                <Select v-model="form.assigned_to" filter :options="props.employees" option-label="employee_name" option-value="id" class="w-full " />
            </div>
                <div>
                <label for="veh_status" class="block text-gray-700">Status</label>
                <Select v-model="form.veh_status" :options="statuses" option-label="name" option-value="value" class="w-full " />
            </div>
            <div class="col-span-3 ">
                <label for="veh_remarks" class="block text-gray-700">Remarks</label>
                <InputText v-model="form.veh_remarks" id="veh_remarks" class=" w-full" />
            </div>
            <div>
                <Button
                    icon="pi pi-save"
                    label="Save"
                    @click="save">
                    
                </Button>
            </div>
        </div>
        <Toast />
    </div>
     
</template>

<script setup>
import { onMounted, ref } from "vue";
import { format } from 'date-fns';

const statuses = ref([
    { value : 'active', name : 'Active'},
    { value : 'inactive', name : 'Inactive'},
]);

onMounted(() => {
    // console.log(props);
    
    form.value = {
        id : props.selectedVehicle?.id ?? null,
        veh_type : props.selectedVehicle?.veh_type ?? null,
        veh_code : props.selectedVehicle?.veh_code ?? null,
        manufacturer_id : props.selectedVehicle?.manufacturer_id ?? null,
        model : props.selectedVehicle?.model ?? null,
        manufacture_year : props.selectedVehicle?.manufacture_year ?? null,
        plate_no : props.selectedVehicle?.plate_no ?? null,
        veh_identification_no : props.selectedVehicle?.veh_identification_no ?? null,
        veh_color : props.selectedVehicle?.veh_color ?? null,
        supplier_id : props.selectedVehicle?.supplier_id ?? null,
        purchase_date : props.selectedVehicle?.purchase_date ? new Date(props.selectedVehicle.purchase_date) : null,
        assigned_to : props.selectedVehicle?.assigned_to ?? null,
        veh_status : props.selectedVehicle?.veh_status ?? 'active',
        veh_remarks : props.selectedVehicle?.veh_remarks ?? null
    };
})

const selectedVehicleType = ref(null);
const selectedManufacturer = ref(null);
const selectedSupplier = ref(null); 
const selectedStatus = ref(null);
const selectedAssignedTo = ref(null);
const purchaseDate = ref(null);
const manufactureYear = ref(null);

const form = ref({
    id : null,
    veh_type : null,
    veh_code : null,
    manufacturer_id : null,
    model : null,
    manufacture_year : null,
    plate_no : null,
    veh_identification_no : null,
    veh_color : null,
    supplier_id : null,
    purchase_date : null,
    assigned_to : null,
    veh_status : 'active',
    veh_remarks : null
});

const props = defineProps([
    'vehicleTypes', 
    'manufacturers',    
    'employees',
    'vehicles',
    'suppliers',
    'selectedVehicle',
]);


const emit = defineEmits([
    'save'
]);

const save = () => {
    // console.log(format(form.value.purchase_date,'MM-dd-yyyy'));
    // toast.add({ severity: 'info', summary: 'Info', detail: 'Message Content', life: 3000 });

    emit('save', form.value);
}

</script>

<style lang="scss" scoped>

</style>