<template>
    <inertia-head title="Ücretsiz Hesap Oluştur - Exxefy"></inertia-head>
    <div class="bg-light register min-vh-100 d-flex flex-row align-items-center" style="
            background-image: url(/assets/img/register-bgfy.jpeg);
            background-size: cover;
            background-position: center;
        ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 shadow-lg">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <h1>Ücretsiz hesap oluşturun</h1>
                                <p class="text-medium-emphasis">
                                    Dakikalar içerisinde ücretsiz bir Exxefy
                                    hesabı oluşturarak satış yapmaya
                                    başlayabilirsiniz.
                                </p>
                                <form @submit.prevent="submit">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fad fa-user"></i>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Ad - Soyad"
                                            v-model="form.name" required autofocus autocomplete="name" />
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fad fa-at"></i>
                                        </span>
                                        <input class="form-control" type="email" placeholder="E-posta"
                                            v-model="form.email" required />
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fad fa-lock"></i>
                                        </span>
                                        <input class="form-control" type="password" placeholder="Şifre"
                                            v-model="form.password" required autocomplete="new-password" />
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fad fa-lock"></i>
                                        </span>
                                        <input class="form-control" type="password" placeholder="Şifre Onayı"
                                            v-model="form.password_confirmation" required autocomplete="new-password" />
                                    </div>

                                    <div class="form-group">
                                        <jet-label for="terms">
                                            <div class="flex items-center">
                                                <jet-checkbox name="terms" id="terms-1" v-model:checked="form.terms" required/>

                                                <div class="ml-2">
                                                    <a target="_blank" :href="
                                                        route('policy.rule1')
                                                    " class="
                                                            underline
                                                            text-xs
                                                            text-gray-600
                                                            hover:text-gray-900
                                                        ">Exxefy Üyelik Sözleşmesi’ni</a> kabul ediyorum.
                                                </div>
                                            </div>
                                        </jet-label>
                                        <jet-label for="terms">
                                            <div class="flex items-center">
                                                <jet-checkbox name="terms" id="terms-2"
                                                    v-model:checked="form.terms_second" required/>
                                                <div class="ml-2">
                                                    <a target="_blank" :href="
                                                        route('policy.rule12')
                                                    " class="
                                                            underline
                                                            text-xs
                                                            text-gray-600
                                                            hover:text-gray-900
                                                        ">Kişisel Verilerin Korunmasına İlişkin Aydınlatma Metni</a>
                                                    ’ni okudum.
                                                </div>
                                            </div>
                                        </jet-label>
                                    </div>
                                    <div class="row">
                                        <jet-validation-errors class="mb-4" />
                                    </div>

                                    <div class="flex items-start">
                                        <jet-button :class="
                                            form.processing
                                                ? 'opacity-25 bg-[#01358D]'
                                                : 'bg-[#01358D]'
                                        " :disabled="form.processing">
                                            KAYDOL
                                        </jet-button>
                                        <!-- <a
                      href="#"
                      @click="$inertia.get(route('login'))"
                      class="
                        no-underline
                        inline-flex
                        items-center
                        px-4
                        py-2
                        bg-red-500
                        ml-2
                        border border-transparent
                        rounded-md
                        font-semibold
                        text-xs text-white
                        tracking-widest
                        hover:bg-red-700
                        active:bg-red-900
                        focus:outline-none
                        focus:border-red-900
                        focus:ring
                        focus:ring-red-300
                        disabled:opacity-25
                        transition
                      "
                    >
                      GİRİŞ YAP
                    </a> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="
                                bg-[#01358D]
                                col-md-5
                                text-white
                                rounded-r
                                py-5
                                flex
                                items-center
                                justify-center
                            ">
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

<style>
@media screen and (max-width: 768px) {
    .register {
        min-width: unset;
        background-image: unset !important;
        background-color: white !important;
        align-items: unset !important;
    }
}
</style>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
    components: {
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                terms: false,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
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
.form-group .text-sm {
    padding: 5px 0px !important;
}
.items-start {
    margin-top: 10px;
}
</style>
