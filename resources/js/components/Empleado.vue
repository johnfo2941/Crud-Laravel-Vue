
<template>
  <div>
    <h1 class="text-center">Registro de empleados</h1>
    <hr />
    <!-- Button trigger modal -->
    <button @click="update= false; openModal();"
      type="button"
      class="btn btn-primary"
    
    >
      Registrar un empleado
    </button>

    <!-- Modal -->
    <div
      class="modal" :class="{show:modal}"
    >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >{{titleModal}}</h5>
            <button  @click="closeModal();"
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form class="form-inline">
  <div class="col-md-4 ">
    <label for="staticEmail2" class="sr-only">Tipo documento</label>
    <input type="text"  class="form-control-plaintext" id="staticEmail2" placeholder="Ingrese tipo de documento">
  </div>
  <div class="fcol-md-4 ">
    <label for="inputPassword2" class="sr-only">Número de documento</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Ingrese número">
  </div>
    <div class="col-md-4 ">
    <label for="inputPassword2" class="sr-only">Nombres</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Nombres">
  </div>
    <div class="col-md-4">
    <label for="inputPassword2" class="sr-only">Apellidos</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Apellidos">
  </div>
  <div class="col-md-4">
    <label for="inputPassword2" class="sr-only">Área</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Área">
  </div>
  <div class="col-md-4">
    <label for="inputPassword2" class="sr-only">Subárea</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Subárea">
  </div>
  
  
</form>
          </div>
          <div class="modal-footer">
            <button @click="closeModal();"
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
             Cerrar
            </button>
            <button type="button" class="btn btn-success">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tipo de documento</th>
          <th scope="col">Número de documento</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Área</th>
          <th scope="col">Subárea</th>
          <th scope="col" colspan="2" class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="empleado in empleados" :key="empleado.id">
          <th scope="row">{{ empleado.id }}</th>
          <td>{{ empleado.tipo_documento }}</td>
          <td>{{ empleado.documento }}</td>
          <td>{{ empleado.nombres }}</td>
          <td>{{ empleado.apellidos }}</td>
          <td>{{ empleado.area }}</td>
          <td>{{ empleado.subarea }}</td>
          <td>
            <button  @click="update= true; openModal(empleado.id);" class="btn btn-success">Editar</button>
          </td>
          <td>
            <button @click="eliminar(empleado.id)" class="btn btn-danger">
              Eliminar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  data() {
    return {
        update:true,
        modal:0,
        titleModal:'',
      empleados: [],
    };
  },
  methods: {
    async list() {
      const res = await axios.get("empleados");
      this.empleados = res.data;
    },

    async eliminar(id) {
      const res = await axios.delete("/empleados/" + id); // ruta de empleados
      this.empleados = res.data;
      this.list();


      
    },
    // --------
    openModal(id=0) {
     this.modal =1;
     if (this.update){
         this.titleModal="Modificar datos del empleado";

     }else{
         this.titleModal="Crear nuevo empleado";
     }
    },

   closeModal() {
    this.modal=0;
    },
  },

  created() {
    this.list();
  },
};
</script>


<style >
.show{
    display: list-item;
    opacity:1;
    background:rgba(44,38,75,0.849)
}
</style>