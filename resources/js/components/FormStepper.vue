<template>
  <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow">
    <div class="flex justify-between mb-4">
      <div v-for="(step, index) in steps" :key="index" class="text-center flex-1">
        <div :class="[
          'w-10 h-10 mx-auto rounded-full text-white flex items-center justify-center',
          currentStep === index ? 'bg-blue-500' : step.completed ? 'bg-green-500' : 'bg-gray-300'
        ]">
          {{ index + 1 }}
        </div>
        <div class="text-sm mt-2">{{ step.title }}</div>
      </div>
    </div>
    <div>
      <h2 class="text-xl font-bold">Step {{ currentStep + 1 }}: {{ steps[currentStep].title }}</h2>
      <p class="mt-2 text-gray-600">Step content goes here.</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FormStepper',
  props: {
    initialSteps: {
      type: Array,
      required: true,
    },
    initialCurrentStep: {
      type: Number,
      default: 0,
    },
  },
  data() {
    return {
      steps: this.initialSteps,
      currentStep: this.initialCurrentStep,
    };
  },
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
