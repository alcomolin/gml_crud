<template>
    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <h1 class="text-center">USUARIOS</h1>
            </div>
            <div class="col">
                <button
                    type="button"
                    class="btn btn-info float-right"
                    @click="abrirModal()"
                >
                    +
                </button>
            </div>
        </div>
        <div
            class="modal fade"
            id="formUsuario"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            {{ tipoModal }} Usuario
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nombre"
                                    v-model="usuario.nombre"
                                />
                                <span
                                    class="text-danger"
                                    v-if="errores.nombre"
                                    >{{ errores.nombre[0] }}</span
                                >
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="apellidos"
                                    v-model="usuario.apellidos"
                                />
                                <span
                                    class="text-danger"
                                    v-if="errores.apellidos"
                                    >{{ errores.apellidos[0] }}</span
                                >
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="cedula"
                                    v-model="usuario.cedula"
                                />
                                <span
                                    class="text-danger"
                                    v-if="errores.cedula"
                                    >{{ errores.cedula[0] }}</span
                                >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    v-model="usuario.email"
                                />
                                <span
                                    class="text-danger"
                                    v-if="errores.email"
                                    >{{ errores.email[0] }}</span
                                >
                            </div>
                            <div class="form-group">
                                <label for="pais">Pais</label>
                                <select
                                    class="form-control"
                                    id="pais"
                                    v-model="usuario.pais"
                                >
                                    <option value="" disabled>
                                        Seleccione un Pais
                                    </option>
                                    <option
                                        v-for="pais in paises"
                                        :value="pais.name"
                                    >
                                        {{ pais.name }}
                                    </option>
                                </select>
                                <span
                                    class="text-danger"
                                    v-if="errores.categoria"
                                    >{{ errores.categoria[0] }}</span
                                >
                                <span class="text-danger" v-if="errores.pais">{{
                                    errores.pais[0]
                                }}</span>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="direccion"
                                    v-model="usuario.direccion"
                                />
                                <span
                                    class="text-danger"
                                    v-if="errores.direccion"
                                    >{{ errores.direccion[0] }}</span
                                >
                            </div>
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="celular"
                                    v-model="usuario.celular"
                                />
                                <span
                                    class="text-danger"
                                    v-if="errores.celular"
                                    >{{ errores.celular[0] }}</span
                                >
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select
                                    class="form-control"
                                    id="categoria"
                                    v-model="usuario.categoria"
                                >
                                    <option value="" disabled>
                                        Seleccione una Categoria
                                    </option>
                                    <option
                                        v-for="categoria in categorias"
                                        :value="categoria.id"
                                    >
                                        {{ categoria.nombre }}
                                    </option>
                                </select>
                                <span
                                    class="text-danger"
                                    v-if="errores.categoria"
                                    >{{ errores.categoria[0] }}</span
                                >
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Cerrar
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="guardar()"
                        >
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center table-responsive-md">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Email</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Categoria</th>
                        <th scope="col" colspan="2" class="text-center">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="usuario in usuarios" :key="usuario.id">
                        <th scope="row">{{ usuario.id }}</th>
                        <td>{{ usuario.nombre }}</td>
                        <td>{{ usuario.apellidos }}</td>
                        <td>{{ usuario.cedula }}</td>
                        <td>{{ usuario.email }}</td>
                        <td>{{ usuario.pais }}</td>
                        <td>{{ usuario.direccion }}</td>
                        <td>{{ usuario.celular }}</td>
                        <td>{{ usuario.categoria }}</td>
                        <td>
                            <button
                                @click="abrirModal(usuario)"
                                class="btn btn-dark"
                            >
                                Editar
                            </button>
                        </td>
                        <td>
                            <button
                                @click="eliminar(usuario.id)"
                                class="btn btn-danger"
                            >
                                Eliminar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tipoModal: "",
            usuario: {
                id: "",
                nombre: "",
                apellidos: "",
                cedula: "",
                email: "",
                pais: "",
                direccion: "",
                celular: "",
                categoria: "",
            },
            usuarios: [],
            categorias: [],
            paises: [],
            errores: {},
        };
    },
    methods: {
        async listar() {
            const resultado = await axios.get("usuarios");
            this.usuarios = resultado.data;
        },
        async listarCategoria() {
            const resultado = await axios.get("categorias");
            this.categorias = resultado.data;
        },
        async listarPaises() {
            const resultado = await axios.get(
                "https://restcountries.com/v2/regionalbloc/usan"
            );
            this.paises = resultado.data;
        },
        async eliminar(id) {
            const resultado = await axios.delete("usuarios/" + id);
            this.listar();
        },
        async guardar() {
            try {
                const id = this.usuario.id;
                if (id != "") {
                    const resultado = await axios.put(
                        "usuarios/" + id,
                        this.usuario
                    );
                } else {
                    const resultado = await axios.post(
                        "usuarios/",
                        this.usuario
                    );
                }
                this.listar();
                $("#formUsuario").modal("toggle");
            } catch (error) {
                if (error.response.data) {
                    this.errores = error.response.data.errors;
                }
            }
        },
        abrirModal(data = {}) {
            this.errores = {};
            this.tipoModal = Object.keys(data).length > 0 ? "Editar" : "Crear";
            this.usuario =
                Object.keys(data).length > 0
                    ? data
                    : {
                          id: "",
                          nombre: "",
                          apellidos: "",
                          cedula: "",
                          email: "",
                          pais: "",
                          direccion: "",
                          celular: "",
                          categoria: "",
                      };
            $("#formUsuario").modal("toggle");
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
    created() {
        this.listar();
        this.listarCategoria();
        this.listarPaises();
    },
};
</script>
