<template>
    <Head title="Create Account" />

    <div class="container">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-12 col-md-4">
                <h1 class="text-center">Create Account</h1>
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name" v-model="form.name">
                        <span v-if="form.errors.name" v-text="form.errors.name" class="text-danger text-sm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Enter Email" v-model="form.email">
                        <span v-if="form.errors.email" v-text="form.errors.email" class="text-danger text-sm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Enter Password" v-model="form.password">
                        <span v-if="form.errors.password" v-text="form.errors.password" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" v-model="form.password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary w-100" :disabled="form.processing">Create Account</button>
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
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            })
        };
    },

    methods: {
        submit() {
            this.form.post(route('register'));
        }
    }
};
</script>
