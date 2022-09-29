<template>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <Link class="navbar-brand" :href="route('welcome')">{{ $page.props.env.APP_NAME }}</Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <template v-if="$page.props.auth.user">
                        <li class="nav-item">
                            <Link class="nav-link" :href="route('home')">Home</Link>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $page.props.auth.user.name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><Link class="dropdown-item" :href="route('users.edit', { id: $page.props.auth.user.id})">Edit Profile</Link></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" :href="route('logout')" method="post" as="button">Logout</Link>
                        </li>
                    </template>

                    <template v-else>
                        <li v-if="$page.props.auth.canLogin" class="nav-item">
                            <Link class="nav-link" :href="route('login')">Login</Link>
                        </li>
                        <li v-if="$page.props.auth.canRegister" class="nav-item">
                            <Link class="nav-link" :href="route('register')">Create Account</Link>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </nav>
</template>
