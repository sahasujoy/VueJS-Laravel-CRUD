<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue Laravel CRUD</title>
        {{-- bootstrap 5 cdn --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        {{-- bootstrap icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <script src="https://unpkg.com/vue@3"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="content" id="app">
        <div class="modal fade" ref="my-modal" id="addLandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Land</h5>
                        <button type="button" class="btn-close" ref="submitBtn" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form id="add_land_form" @submit.prevent="addLand" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="my-2">
                                <label for="mname">Mouza Name</label>
                                <input type="text" v-model="formData.mouza_name" name="mname" class="form-control"
                                    placeholder="Mouza Name" required>
                            </div>
                            <div class="my-2">
                                <label for="size">Land Size</label>
                                <input type="text" v-model="formData.size" name="size" class="form-control"
                                    placeholder="Last Name" required>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="khatiyan">Khatiyan No.</label>
                                    <input type="text" v-model="formData.kcs" name="kcs" class="form-control"
                                        placeholder="CS" required>
                                </div>
                                <div class="col-lg">
                                    <label for="khatiyan">Khatiyan No.</label>
                                    <input type="text" v-model="formData.ksa" name="ksa" class="form-control"
                                        placeholder="SA" required>
                                </div>
                                <div class="col-lg">
                                    <label for="khatiyan">Khatiyan No.</label>
                                    <input type="text" v-model="formData.krs" name="krs" class="form-control"
                                        placeholder="RS" required>
                                </div>
                                <div class="col-lg">
                                    <label for="khatiyan">Khatiyan No.</label>
                                    <input type="text" v-model="formData.kbs" name="kbs" class="form-control"
                                        placeholder="BS" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <label for="khatiyan">Daag No.</label>
                                    <input type="text" v-model="formData.dcs" name="dcs" class="form-control"
                                        placeholder="CS" required>
                                </div>
                                <div class="col-lg">
                                    <label for="khatiyan">Daag No.</label>
                                    <input type="text" v-model="formData.dsa" name="dsa" class="form-control"
                                        placeholder="SA" required>
                                </div>
                                <div class="col-lg">
                                    <label for="khatiyan">Daag No.</label>
                                    <input type="text" v-model="formData.drs" name="drs" class="form-control"
                                        placeholder="RS" required>
                                </div>
                                <div class="col-lg">
                                    <label for="khatiyan">Daag No.</label>
                                    <input type="text" v-model="formData.dbs" name="dbs" class="form-control"
                                        placeholder="BS" required>
                                </div>
                            </div>
                            <div class="my-2">
                                <label for="post">Land Address</label>
                                <input type="text" v-model="formData.address" name="address" class="form-control"
                                    placeholder="Land Address" required>
                            </div>
                            <div class="my-2">
                                <label for="image">Select Land Image</label>
                                <input type="file" v-on:change="onImageChange" name="image" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_land_btn" class="btn btn-primary">Add Land</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<div class="modal fade" id="editLandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Land</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" ref="submitBtn" aria-label="Close"></button>
    </div>
    <form action="#" method="PUT" @submit.prevent="updateLand(land.id)" id="edit_building_form">
      @csrf
      <div class="modal-body p-4 bg-light">
        <div class="my-2">
            <label for="mname">Mouza Name</label>
            <input type="text" v-model="land.mouza_name" name="mname" class="form-control"
                placeholder="Mouza Name" required>
        </div>
        <div class="my-2">
            <label for="size">Land Size</label>
            <input type="text" v-model="land.size" name="size" class="form-control"
                placeholder="Last Name" required>
        </div>
        <div class="row">
            <div class="col-lg">
                <label for="khatiyan">Khatiyan No.</label>
                <input type="text" v-model="land.kcs" name="kcs" class="form-control"
                    placeholder="CS" required>
            </div>
            <div class="col-lg">
                <label for="khatiyan">Khatiyan No.</label>
                <input type="text" v-model="land.ksa" name="ksa" class="form-control"
                    placeholder="SA" required>
            </div>
            <div class="col-lg">
                <label for="khatiyan">Khatiyan No.</label>
                <input type="text" v-model="land.krs" name="krs" class="form-control"
                    placeholder="RS" required>
            </div>
            <div class="col-lg">
                <label for="khatiyan">Khatiyan No.</label>
                <input type="text" v-model="land.kbs" name="kbs" class="form-control"
                    placeholder="BS" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <label for="khatiyan">Daag No.</label>
                <input type="text" v-model="land.dcs" name="dcs" class="form-control"
                    placeholder="CS" required>
            </div>
            <div class="col-lg">
                <label for="khatiyan">Daag No.</label>
                <input type="text" v-model="land.dsa" name="dsa" class="form-control"
                    placeholder="SA" required>
            </div>
            <div class="col-lg">
                <label for="khatiyan">Daag No.</label>
                <input type="text" v-model="land.drs" name="drs" class="form-control"
                    placeholder="RS" required>
            </div>
            <div class="col-lg">
                <label for="khatiyan">Daag No.</label>
                <input type="text" v-model="land.dbs" name="dbs" class="form-control"
                    placeholder="BS" required>
            </div>
        </div>
        <div class="my-2">
            <label for="post">Land Address</label>
            <input type="text" v-model="land.address" name="address" class="form-control"
                placeholder="Land Address" required>
        </div>
        <div class="my-2">
            <label for="image">Select Land Image</label>
            <input type="file" v-on:change="onImageUpdate" name="image" class="form-control">
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="edit_building_btn" class="btn btn-success">Update Land</button>
      </div>
    </form>
  </div>
</div>
</div>

        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                            <h3 class="text-light">Manage Lands</h3>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addLandModal"><i
                                    class="bi-plus-circle me-2"></i>Add New Land</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-secondary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" rowspan="2">#</th>
                                        <th scope="col" rowspan="2">Mouza Name</th>
                                        <th scope="col" rowspan="2">Land Size</th>
                                        <th scope="col" colspan="4">Khatiyan No.</th>
                                        <th scope="col" colspan="4">Daag No.</th>
                                        <th scope="col" rowspan="2">Address</th>
                                        <th scope="col" rowspan="2">Image</th>
                                        <th scope="col" rowspan="2">Actions</th>
                                    </tr>
                                    <tr>
                                        <th>CS</th>
                                        <th>SA</th>
                                        <th>RS</th>
                                        <th>BS</th>
                                        <th>CS</th>
                                        <th>SA</th>
                                        <th>RS</th>
                                        <th>BS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(land, index) in lands" :key="land.id">
                                        <td>@{{ index + 1 }}</td>
                                        <td>@{{ land.mouza_name }}</td>
                                        <td>@{{ land.size }}</td>
                                        <td>@{{ land.kcs }}</td>
                                        <td>@{{ land.ksa }}</td>
                                        <td>@{{ land.krs }}</td>
                                        <td>@{{ land.kbs }}</td>
                                        <td>@{{ land.dcs }}</td>
                                        <td>@{{ land.dsa }}</td>
                                        <td>@{{ land.drs }}</td>
                                        <td>@{{ land.dbs }}</td>
                                        <td>@{{ land.address }}</td>

                                        <td> <img v-bind:src="'/storage/images/' +land.image"
                                                class="img-thumbnail rounded-circle" :style="{ width: width }" /> </td>
                                        <td>
                                            <a href="#" id="#" @click.prevent="editLand(land.id)"
                                                class="text-success mx-1 editIcon" data-bs-toggle="modal"
                                                data-bs-target="#editLandModal"><i
                                                    class="bi-pencil-square h4"></i></a>
                                            <a href="#" id="#" @click.prevent="deleteLand(land.id)"
                                                class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                            {{-- <button class="btn btn-danger btn-sm" @click.prevent="deleteLand(land.id)"><i
                                                    class="bi-trash h4"></i></button> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



        {{-- bootstrap 5 cdn --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            const app = Vue.createApp({
                data() {
                    return {
                        lands: [],
                        width: "50px",
                        formData: {
                            mouza_name: '',
                            size: '',
                            kcs: '',
                            ksa: '',
                            krs: '',
                            kbs: '',
                            dcs: '',
                            dsa: '',
                            drs: '',
                            dbs: '',
                            address: '',
                            image: '',
                        },
                        land: {},
                    }
                },

                methods: {
                    onImageChange(e) {
                        console.log(e.target.files[0]);
                        this.formData.image = e.target.files[0];
                    },

                    onImageUpdate(e) {
                        this.land.image = e.target.files[0];
                    },

                    addLand() {
                        const config = {
                            headers: {
                                'content-type': 'multipart/form-data'
                            }
                        }

                        let formData = new FormData();
                        formData.append('image', this.formData.image);

                        axios.post('http://127.0.0.1:8000/api/store_land', this.formData, config)
                            .then((response) => {
                                console.log(response);
                                if (response.data.status == 200) {
                                    this.formData.mouza_name = '';
                                    this.formData.size = '';
                                    this.formData.kcs = '';
                                    this.formData.ksa = '';
                                    this.formData.krs = '';
                                    this.formData.kbs = '';
                                    this.formData.dcs = '';
                                    this.formData.dsa = '';
                                    this.formData.drs = '';
                                    this.formData.dbs = '';
                                    this.formData.address = '';
                                    this.formData.image = '';
                                    this.$refs.submitBtn.click();
                                    Swal.fire(
                                        'Added!',
                                        'Flat Added Successfully!',
                                        'success'
                                    );

                                }
                                this.fetchAll();
                                // $('#success').html(response.data.message)
                            }).catch((errors) => {
                                console.log(errors);
                            });
                    },

                    fetchAll() {
                        axios.get('http://127.0.0.1:8000/api/lands')
                            .then(response => this.lands = response.data)
                            .catch(error => console.log(error));
                    },

                    editLand(id)
                    {
                        let url = `http://127.0.0.1:8000/api/edit_land/${id}`;
                        axios.get(url).then(response => {
                            this.land = response.data;
                            console.log(this.land);
                        }).catch(error => {
                            console.log(error);
                        });
                    },

                    updateLand(id)
                    {
                        const config = {
                            headers: {
                                'content-type': 'multipart/form-data'
                            }
                        }

                        // let lan = this.land;
                        // lan.append('image', this.land.image);

                        let url = `http://127.0.0.1:8000/api/update_land/${id}`;
                        axios.post(url, this.land, config)
                            .then((response) => {
                                console.log(response);
                                if (response.data.status == 200) {
                                    this.land.mouza_name = '';
                                    this.land.size = '';
                                    this.land.kcs = '';
                                    this.land.ksa = '';
                                    this.land.krs = '';
                                    this.land.kbs = '';
                                    this.land.dcs = '';
                                    this.land.dsa = '';
                                    this.land.drs = '';
                                    this.land.dbs = '';
                                    this.land.address = '';
                                    this.land.image = '';
                                    this.$refs.submitBtn.click();
                                    Swal.fire(
                                        'Updated!',
                                        'Land Updated Successfully!',
                                        'success'
                                    );

                                }
                                this.fetchAll();
                                // $('#success').html(response.data.message)
                            }).catch((errors) => {
                                console.log(errors);
                            });
                    },

                    async deleteLand(id) {
                        // alert(id);
                        let url = `http://127.0.0.1:8000/api/delete_land/${id}`;
                        await axios.delete(url).then(response => {
                            if (response.data.status == 200) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                this.fetchAll();
                            }
                        }).catch(error => {
                            console.log(error);
                        });
                    },
                },

                mounted() {
                    axios.get('http://127.0.0.1:8000/api/lands')
                        .then(response => this.lands = response.data)
                        .catch(error => console.log(error));
                },
            });

            app.mount("#app");
        </script>
</body>
</html>

