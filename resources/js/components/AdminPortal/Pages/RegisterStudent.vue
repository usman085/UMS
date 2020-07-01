<template>
<div class="student-register-form">
    <h2 class="text-center">Register New Student</h2>
    <v-divider></v-divider>
    <StudentRegistratonForm />
</div>
<!--student-register-form-->
</template>

<script>
import StudentRegistratonForm from '../PartialComponents/StudentRegistrationForm';
export default {
    name: 'registerStudent',
    components: {
        StudentRegistratonForm
    }
}
</script>
