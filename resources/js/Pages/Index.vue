<template>
    <Head title="Page D'acceuil"/>
    <br>
    <div>
        <h1 class="text-base text-center underline">Bienvenue sur Notre page web</h1>
        <div v-for="item,i in users" class="border-red-200 bg-gray-100 rounded mx-auto container my-10">
            <div class="card py-4">
                <div class="bg-gray-300 p-4">
                    <h2>{{item.name}}  # {{ item.id }}</h2>
                </div>
                <p class="border-indigo-400 px-4 py-2">
                    votre compte a ete cree le {{ item.created_at.substring(0,10) }}
                </p>
                <nav-link href="route('dashboard')" class="px-4 mx-4 block">suivant</nav-link>
                <button class="bg-blue-300 px-4 mx-4 border-red-200">Suivre...</button>
            </div>
        </div>
    </div>
</template>

<script>
import { Head , InertiaLink } from "@inertiajs/inertia-vue3"
import {Link} from "@inertiajs/inertia-vue3";
import {InertiaApp} from "@inertiajs/inertia-vue3";
import NavLink from "@/Components/NavLink";
export default {
    components:{
        Head,
        Link,
        NavLink

    },
    props: [
        "users"
    ],


    data(){
        return{
            dropdowns:[
                {
                    title:"lucas",
                    content:"bienvenue si"
                },{}
            ]
        }
    },
    mounted() {
        console.log(this.users)
    }
}
</script>
