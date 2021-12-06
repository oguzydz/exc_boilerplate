<template>
<inertia-head title="Exxestock - Kullanıcı Girişi"></inertia-head>
<div class="bg-light min-vh-100 d-flex flex-row align-items-center" style="background-image: url(/assets/img/login-bg.jpg); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 shadow-lg  ">
                <div class="card-group d-block d-md-flex row">
                    <div class="card col-md-7 p-4 mb-0">
                        <div class="card-body">
                            <h1>Kullanıcı Girişi</h1>
                            <p class="text-medium-emphasis">Hemen hesabınıza giriş yapın.</p>
                            <form @submit.prevent="submit">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fad fa-user"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="E-Posta" v-model="form.email" required autofocus />
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
                                        <jet-button :class="form.processing ? 'opacity-25 bg-[#01358D]' : 'bg-[#01358D]'" :disabled="form.processing">
                                            GİRİŞ
                                        </jet-button>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-medium-emphasis mt-3 mb-0">
                                            <a href="#" @click="$inertia.get(route('register'))" class="font-semibold text-black">
                                                Hesabın yok mu? Hemen ücretsiz hesap oluştur!
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bg-[#01358D] col-md-5 text-white rounded-r py-5 flex items-center justify-center" >
                        <img class="img-register" src="/assets/img/exxefy-logo-white.png" />
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
<style>
h1 {
  font-size: 24px;
  font-weight: bold;
}
p {
  font-size: 14px;
}
input::-webkit-input-placeholder {
  font-weight: 500;
  font-size: 14px;
}
.img-register {
    width: 120px;
}
</style>
