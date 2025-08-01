<?php $__env->startSection("title", "Sign In - DsignLoft"); ?>

<?php $__env->startSection("content"); ?>
<div class="auth-container" id="login-app">
    <div class="logo"><img src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo_dsignloft-Y4LxQ4REjXhxO2a5.svg" alt="DsignLoft Logo" style="width: 150px;"></div>
    <p class="subtitle">Welcome back! Sign in to your account</p>
    
    <x-ui.alert type="error" :message="errorMessage" v-if="errorMessage" />
    <x-ui.alert type="success" :message="successMessage" v-if="successMessage" />
    
    <div class="loading" v-if="loading">Signing in...</div>

    <form @submit.prevent="handleLogin">
        <x-ui.form-group label="Email Address" for="email">
            <input id="email" name="email" required type="email" v-model="email" />
        </x-ui.form-group>
        <x-ui.form-group label="Password" for="password">
            <input id="password" name="password" required type="password" v-model="password" />
        </x-ui.form-group>
        <button class="btn-primary" type="submit" :disabled="loading">Sign In</button>
    </form>
    <div class="forgot-password"><a href="#" @click.prevent="handleForgotPassword">Forgot Password?</a></div>
    <div class="auth-link">Don't have an account? <a href="<?php echo e(url("signup")); ?>">Create one here</a></div>
</div>

<?php $__env->startPush("scripts"); ?>

<!-- Styles -->
<link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">

<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            email: "",
            password: "",
            errorMessage: "",
            successMessage: "",
            loading: false
        }
    },
    methods: {
        async handleLogin() {
            this.loading = true;
            this.errorMessage = "";
            this.successMessage = "";
            try {
                await firebase.auth().signInWithEmailAndPassword(this.email, this.password);
                this.successMessage = "Login successful! Redirecting...";
                window.location.href = "/client"; // Or your desired dashboard page
            } catch (error) {
                this.errorMessage = error.message;
            } finally {
                this.loading = false;
            }
        },
        handleForgotPassword() {
            // Implement forgot password logic, e.g., show a modal or redirect
            alert("Forgot password functionality not yet implemented.");
        }
    }
}).mount("#login-app");
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.auth", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/priokus/dsignloft/resources/views/login.blade.php ENDPATH**/ ?>