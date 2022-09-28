<template>
    <Head title="Reset Password" />

    <div class="container">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-12 col-md-4">
                <h1 class="text-center">Reset Password</h1>
                <div v-if="status" class="alert alert-success" role="alert">
                    {{ status }}
                </div>
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Enter Email" v-model="form.email" autofocus>
                        <span v-if="form.errors.email" v-text="form.errors.email" class="text-danger text-sm"></span>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" :disabled="form.processing">Send Password Reset Link</button>
                    <p v-if="$page.props.auth.canLogin" class="text-center mt-3">
                        <Link :href="route('login')" class="text-decoration-none">Login</Link>
                    </p>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    layout: null,

    data() {
        return {
            form: this.$inertia.form({
                email: '',
            })
        };
    },

    computed: {
        status() {
            return this.$page.props.flash.status;
        }
    },

    methods: {
        submit() {
            this.form.post(route('password.email'), {
                onFinish: () => this.form.reset('email'),
            });
        }
    }
};
</script>
