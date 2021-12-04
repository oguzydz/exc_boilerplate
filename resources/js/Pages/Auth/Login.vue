<template>
<inertia-head title="Exxestock - Kullanıcı Girişi"></inertia-head>
<div class="bg-light min-vh-100 d-flex flex-row align-items-center" style="background-image: url(/images/login-wallpaper-2.jpg); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 shadow-lg  ">
                <div class="card-group d-block d-md-flex row">
                    <div class="card col-md-7 p-4 mb-0">
                        <div class="card-body">
                            <h1>Kullanıcı Girişi</h1>
                            <p class="text-medium-emphasis">Hesaba Giriş Yap</p>
                            <form @submit.prevent="submit">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fad fa-user"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Kullanıcı Adı" v-model="form.email" required autofocus />
                                </div>
                                <div class="input-group mb-4">
                                    <span class="bg-red-500 input-group-text">
                                        <i class="fad fa-lock"></i>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Şifre" v-model="form.password" required autocomplete="current-password" />
                                </div>
                                <div class="row">
                                    <jet-validation-errors class="mb-4" />
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <jet-button :class="form.processing ? 'opacity-25 bg-[#7450fe]' : 'bg-[#7450fe]'" :disabled="form.processing">
                                            GİRİŞ
                                        </jet-button>
                                        <a href="#" @click="$inertia.get(route('register'))" class="no-underline inline-flex items-center px-4 py-2 bg-red-500 ml-2 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                                            KAYDOL
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bg-[#7450fe] col-md-5 text-white rounded-r py-5 flex items-center justify-center" >
                        <img class="w-75" src="/assets/img/exxefylogo.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import JetButton from '@/Jetstream/Button'
import JetValidationErrors from '@/Jetstream/ValidationErrors'

export default {
    components: {
        JetButton,
        JetValidationErrors,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false,
            }),
        }
    },

    methods: {
        submit() {
            this.form
                .transform((data) => ({
                    ...data,
                    remember: this.form.remember ? 'on' : '',
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        },
    },
}
</script>
