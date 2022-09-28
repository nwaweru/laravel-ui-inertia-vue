<template>
    <Head title="Welcome" />

    <div class="container">
        <div class="row vh-100 align-items-center">
            <div class="col-12 text-center">
                <h1 >Welcome to {{ $page.props.env.APP_NAME }}</h1>
                <p>
                    Laravel v{{ $page.props.env.LARAVEL_VERSION }} (PHP v{{ $page.props.env.PHP_VERSION }})
                </p>
            </div>
        </div>
    </div>
</template>
