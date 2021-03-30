<template>
    <div>
        <pre>
            {{ JSON.stringify({tours,status,location}, null, 2) }}
</pre>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox ">
                    <button type="button" class="btn btn-w-m btn-success" style="float: right;"><i
                            class="fa fa-plus"></i>สร้างทัวร์ใหม่</button><br>
                    <div class="ibox-content">
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อทัวร์</th>
                                    <th>รอบ</th>
                                    <th>สมาชิกทัวร์<br>(ลงชื่อแล้ว/ทั้งหมด)</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="tour in tours.tour" v-bind:key="tour.id">
                                    <td>{{tour.id}}</td>
                                    <td>{{tour.tour_name}}</td>
                                    <td>{{tour.start_round}}-{{tour.end_round}}</td>
                                    <td>{{tour.num_people}} <a href="#">ลงทะเบียน</a></td>
                                    <td>{{tour.status}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <h4>Create Tour</h4>
            <form @submit.prevent="submitCreateToure()">
                <div class="form-group"><label>ชื่อทัวร์</label> <input v-model="tours.tour_name" type="text"
                        placeholder="ชื่อทัวร์" class="form-control"></div>
                <div class="form-group"><label>เริ่มรอบ</label> <input v-model="tours.start_round" type="date"
                        placeholder="เริ่มรอบ" class="form-control"></div>
                <div class="form-group"><label>จบรอบ</label> <input v-model="tours.end_round" type="date"
                        placeholder="จบรอบ" class="form-control"></div>

                <div class="form-group"><label>สถานะ</label>
                    <div class="col-sm-10">
                        <select class="form-control m-b" name="account" v-model="tours.status">
                            <option v-for="tour in status.status" v-bind:values="tour.id" v-bind:key="tour.id">
                                {{tour.status}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group"><label>ต้องจ่ายเงินก่อน</label> <input v-model="tours.pay_date" type="date"
                        placeholder="ชื่อทัวร์" class="form-control"></div>
                <div class="form-group"><label>จำนวนคน</label> <input v-model="tours.num_people" type="text"
                        placeholder="จำนวนคน" class="form-control"></div>
                <div class="form-group"><label>ค่าทัวร์</label> <input v-model="tours.tour_price" type="text"
                        placeholder="ค่าทัวร์" class="form-control"></div>
                <div class="form-group"><label>ประเทศ</label><select class="form-control m-b" v-model="tours.country">
                        <option v-for="location in location.locations" v-bind:values="location.id"
                            v-bind:key="location.id">
                            {{location.country}}
                        </option>
                    </select></div>
                <div class="form-group"><label>เมือง</label> <select class="form-control m-b" v-model="tours.city">
                        <option v-for="location in location.locations" v-bind:values="location.id"
                            v-bind:key="location.id">
                            {{location.city}}
                        </option>
                    </select></div>
                <div class="form-group"><label>note</label> <input v-model="tours.note" type="text" placeholder="note"
                        class="form-control"></div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="row">
            <h4>Create Location</h4>
            <div class="form-group"><label>ประเทศ</label><select class="form-control m-b" v-model="tours.country">
                    <option>สร้างใหม่</option>
                    <option v-for="location in location.locations" v-bind:values="location.id" v-bind:key="location.id">
                        {{location.country}}
                    </option>
                </select></div>
            <div class="form-group"><label>เมือง</label> <select class="form-control m-b" v-model="tours.city">
                    <option v-for="location in location.locations" v-bind:values="location.id" v-bind:key="location.id">
                        {{location.city}}
                    </option>
                </select></div>
        </div>
        <br>
        <br>
        <div class="row">
            <h4>Register</h4>
            <form>
                <div class="form-group"><label>ชื่อทัวร์</label>
                    <div class="col-sm-10">
                        <select class="form-control m-b" name="account" v-model="tours.tour_name">
                            <option v-for="tour in tours.tour" v-bind:values="tour.id" v-bind:key="tour.id">
                                {{tour.tour_name}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group"><label>รอบ</label> <input :value="`${tours.start_round} (${tours.end_round})`"
                        type="text" placeholder="รอบ" class="form-control"></div>
                <br>
                <button type="button" class="btn btn-w-m btn-success">เพิ่มรายการ</button>
                <table style="width:70%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อลูกค้า</th>
                            <th>สถานะ</th>
                            <th>จ่ายแล้ว</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                    </div>
                </div>

            </form>
        </div>

    </div>

</template>
<script>
    import Axios from 'axios'
    export default {
        created() {
            this.getTour()
            this.getStatus()
            this.getLocation()

        },
        data() {
            return {
                mode: null,
                tours: {
                    tour_name: "ทัวร์เกาหลี",
                    status: "open for register",
                    pay_date: "2021-04-01",
                    start_round: "2021-03-30",
                    end_round: "2021-04-01",
                    tour_price: "999",
                    num_people: "20",
                    country: "เกาหลี",
                    city: "โซล",
                    note: "shopping",
                },
                status: {},
                location: {},
                registers: {},
            }

        },
        // computed: {
        //     citiesDependOnSelectedcountry() {
        //         return this.cities.filter(el => el.state === this.location)
        //     }
        // },
        methods: {
            getStatus() {
                Axios.get('/api/status').then(({
                    data
                }) => {
                    console.log(data)
                    this.status = data

                })
            },
            showCreateTour() {
                this.mode = "craete";
                window.history.pushState(
                    null,
                    null,
                );
            },
            getTour() {
                Axios.get('/api/tour').then(({
                    data
                }) => {
                    console.log(data)
                    this.tours = data

                })
            },
            getLocation() {
                Axios.get('/api/location').then(({
                    data
                }) => {
                    console.log(data)
                    this.location = data

                })
            },
            getRegiter(id) {
                let register = {
                    ...this.registers
                }
                Axios.get(`/api/register/${id}`, register).then(({
                    data
                }) => {
                    console.log(data)
                    alert('Register Success')
                    this.registers = data

                })

            },
            submitCreateToure() {
                let data = {
                    ...this.tours
                }
                Axios.post('/api/tour/create', data).then(({
                    data
                }) => {
                    console.log(data)
                    alert('Create Success')
                    this.tours = data
                    this.getTour()

                })
            }

        }
    }

</script>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
    }

    th {
        text-align: left;
    }

</style>
