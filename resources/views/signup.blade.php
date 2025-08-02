@extends("layouts.auth")

@section("title", "Create Account - DsignLoft")

@section("content")
<div class="auth-container" id="signup-app">
    <div class="logo"><img src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo_dsignloft-Y4LxQ4REjXhxO2a5.svg" alt="DsignLoft Logo" style="width: 150px;"></div>
    <p class="subtitle">Create your account to get started</p>
    
    <x-ui.alert type="info" :message="message" v-if="message" />
    
    <div class="g_id_signin" data-type="standard" data-theme="filled_black" data-text="sign_up_with"></div>
    <div class="divider"><span>or</span></div>
    
    <form @submit.prevent="handleSignup">
        <x-ui.form-group label="Full Name" for="fullName">
            <input id="fullName" name="fullName" required type="text" v-model="fullName" />
        </x-ui.form-group>
        <x-ui.form-group label="Email Address" for="email">
            <input id="email" name="email" required type="email" v-model="email" />
        </x-ui.form-group>
        <x-ui.form-group label="Password" for="password">
            <input id="password" minlength="6" name="password" required type="password" v-model="password" />
        </x-ui.form-group>
        <button class="btn-primary" type="submit" :disabled="loading">Create Account</button>
    </form>
    <div class="auth-link">
        Already have an account? <a href="{{ url("login") }}">Sign in here</a>
    </div>
</div>

@push("scripts")
<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            fullName: "",
            email: "",
            password: "",
            message: "",
            loading: false
        }
    },
    methods: {
        async handleSignup() {
            this.loading = true;
            this.message = "";
            try {
                await firebase.auth().createUserWithEmailAndPassword(this.email, this.password);
                await firebase.auth().currentUser.updateProfile({
                    displayName: this.fullName
                });
                this.message = "Account created successfully! Please check your email for verification.";
                // Optionally, redirect to login or dashboard
                // window.location.href = "/login";
            } catch (error) {
                this.message = error.message;
            } finally {
                this.loading = false;
            }
        }
    }
}).mount("#signup-app");
</script>
@endpush
@endsection

