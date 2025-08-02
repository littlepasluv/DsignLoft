@props(['id', 'method' => 'POST', 'action' => '#'])

<form 
    id="{{ $id }}" 
    method="{{ $method }}" 
    action="{{ $action }}"
    @submit.prevent="handle{{ ucfirst($id) }}Submit"
    class="vue-form"
>
    @csrf
    @if($method !== 'GET' && $method !== 'POST')
        @method($method)
    @endif
    
    <div class="form-loading" v-show="loading">
        <div class="spinner"></div>
        <span>Processing...</span>
    </div>
    
    <div class="form-errors" v-if="errors.length > 0">
        <div class="alert alert-danger">
            <ul>
                <li v-for="error in errors" :key="error">{{ '{{ error }}' }}</li>
            </ul>
        </div>
    </div>
    
    <div class="form-success" v-if="successMessage">
        <div class="alert alert-success">
            {{ '{{ successMessage }}' }}
        </div>
    </div>
    
    {{ $slot }}
</form>

<style>
.vue-form {
    position: relative;
}

.form-loading {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 1rem;
    z-index: 10;
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #007bff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.form-errors, .form-success {
    margin-bottom: 1rem;
}

.alert {
    padding: 0.75rem 1rem;
    border-radius: 0.375rem;
    border: 1px solid transparent;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert ul {
    margin: 0;
    padding-left: 1.5rem;
}
</style>

