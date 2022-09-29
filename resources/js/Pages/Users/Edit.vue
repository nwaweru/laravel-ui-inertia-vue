<template>
    <Head title="Edit User" />

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <h1 class="text-center mt-5">Edit Profile</h1>
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name" v-model="form.name" autofocus>
                        <span v-if="form.errors.name" v-text="form.errors.name" class="text-danger text-sm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Enter Email" v-model="form.email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">You will need to verify a new email.</div>
                        <span v-if="form.errors.email" v-text="form.errors.email" class="text-danger text-sm"></span>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" :disabled="form.processing">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        user: Object
    },

    data() {
        return {
            form: this.$inertia.form({
                name: this.user.name,
                email: this.user.email,
            })
        };
    },

    methods: {
        submit() {
            this.form.patch(route('users.update', {id: this.user.id}));
        }
    }
};
</script>
