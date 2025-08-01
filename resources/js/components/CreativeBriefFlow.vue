<template>
  <div class="creative-brief-flow">
    <div class="progress-container">
      <div class="progress-bar">
        <div class="progress-steps">
          <div v-for="(stepLabel, idx) in stepLabels" :key="idx" :class="['step', {active: step === idx}]">
            <div class="step-number">{{ idx + 1 }}</div>
            <span>{{ stepLabel }}</span>
          </div>
        </div>
        <div class="progress-line">
          <div class="progress-fill" :style="{width: progressPercent + '%'}"></div>
        </div>
      </div>
    </div>

    <div class="main-content">
      <div class="container">
        <component :is="currentStepComponent"
                   v-bind="stepProps"
                   @next="nextStep"
                   @prev="prevStep"
                   @update="updateStepData"/>
      </div>
    </div>

    <div class="navigation">
      <div class="nav-buttons">
        <button class="btn btn-secondary" @click="prevStep" :disabled="step === 0">← Back</button>
        <div class="nav-info">
          <span>Step {{ step + 1 }} of {{ stepLabels.length }}</span>
        </div>
        <button class="btn btn-primary" @click="nextStep" :disabled="!canProceed">
          {{ step === stepLabels.length - 2 ? 'Review →' : step === stepLabels.length - 1 ? 'Finish' : 'Next →' }}
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
// Import step components (to be created)
// import StepLogoSelection from './StepLogoSelection.vue'
// import StepBrandStyle from './StepBrandStyle.vue'
// import StepColors from './StepColors.vue'
// import StepBriefDetails from './StepBriefDetails.vue'
// import StepPackage from './StepPackage.vue'
// import StepSummary from './StepSummary.vue'

// Placeholder step labels and components
const stepLabels = [
  'Logo Selection',
  'Brand Style',
  'Colors',
  'Brief Details',
  'Package',
  'Summary'
]

// Placeholder: use a single component for all steps for now
const stepComponents = [
  'div', 'div', 'div', 'div', 'div', 'div'
]

const step = ref(0)
const stepData = ref({
  selectedLogos: [],
  brandStyles: {},
  selectedColors: [],
  briefDetails: {},
  selectedPackage: null,
  summary: {}
})

const progressPercent = computed(() => (step.value) / (stepLabels.length - 1) * 100)
const currentStepComponent = computed(() => stepComponents[step.value])
const stepProps = computed(() => ({
  step: step.value,
  stepData: stepData.value
}))

const canProceed = computed(() => {
  // Example: require 3 logos before step 2
  if (step.value === 0) return stepData.value.selectedLogos.length === 3
  // Add more validation per step as needed
  return true
})

function nextStep() {
  if (step.value < stepLabels.length - 1 && canProceed.value) step.value++
}
function prevStep() {
  if (step.value > 0) step.value--
}
function updateStepData(newData) {
  stepData.value = { ...stepData.value, ...newData }
}
</script>

<style scoped>
  /* Add your styles or import from app.css */
  
</style>
