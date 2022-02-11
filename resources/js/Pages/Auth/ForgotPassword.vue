<template>
<inertia-head title="Şifremi Unuttum - Exxefy"></inertia-head>
<div class="bg-light min-vh-100 d-flex flex-row align-items-center login" style="background-image: url(/assets/img/login-bgv.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 shadow-lg  ">
                <div class="card-group d-block d-md-flex row">
                    <div class="card col-md-7 p-4 mb-0">
                        <div class="card-body">
                            <h1>Şifremi Unuttum</h1>
                            <p class="text-medium-emphasis">Sadece e-posta adresinizi yazarak şifrenize ulaşabilirsiniz.</p>
                            <form @submit.prevent="submit">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fad fa-user"></i>
                                    </span>
                                    <input class="form-control" type="email" placeholder="E-Posta" v-model="form.email" required autofocus />
                                </div>
                                <div class="row">
                                    <jet-validation-errors class="mb-4" />
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <jet-button :class="form.processing ? 'opacity-25 bg-[#01358D]' : 'bg-[#01358D]'" :disabled="form.processing">
                                            Şifremi Sıfırla
                                        </jet-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bg-[#01358D] col-md-5 text-white rounded-r py-5 flex items-center justify-center" >
                        <a :href="route('home')">
                            <img class="img-register" src="/assets/img/exxefy-logo-white.png" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>



<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    }
</script>
<style>
@media screen and (max-width: 768px) {
    .login {
        min-width: unset;
        background-image: unset !important;
        background-color: white !important;
    }
}

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
