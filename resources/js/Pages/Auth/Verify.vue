<template>
    <Head title="Verify Email" />

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Verify Your Email Address</div>
                    <div class="card-body">
                        <div v-if="flash.resent" class="alert alert-success" role="alert">
                            A fresh verification link has been sent to your email address.
                        </div>

                        Before proceeding, please check your email for a verification link.
                        If you did not receive the email,

                        <Link :href="route('verification.resend')" method="post" as="button">click here to request another</Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        flash: Object
    }
}
</script>
