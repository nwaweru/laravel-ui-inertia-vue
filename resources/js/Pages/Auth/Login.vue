<template>
    <Head title="Login" />

    <div class="container">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-12 col-md-4">
                <h1 class="text-center">Login</h1>
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Enter Email" v-model="form.email">
                        <span v-if="form.errors.email" v-text="form.errors.email" class="text-danger text-sm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Enter Password" v-model="form.password">
                        <span v-if="form.errors.password" v-text="form.errors.password" class="text-danger"></span>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" :disabled="form.processing">Login</button>
                    <div class="text-center mt-3">
                        <p v-if="$page.props.auth.canRegister">
                            Don't have an account?
                            <Link :href="route('register')" class="text-decoration-none">Create your account</Link>
                        </p>

                        <p v-if="$page.props.auth.canResetPassword">
                            <Link :href="route('password.request')" class="text-decoration-none">Reset Password</Link>
                        </p>
                    </div>
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
                password: '',
            })
        };
    },

    methods: {
        submit() {
            this.form.post(route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        }
    }
};
</script>
