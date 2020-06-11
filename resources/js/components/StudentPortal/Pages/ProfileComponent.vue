<template>
  <div>
   
      <ProfileTitleBlock></ProfileTitleBlock>

      <ProfileDetailBlock></ProfileDetailBlock>

  </div>
</template>

<script>
import ProfileTitleBlock from "../PartialsComponent/ProfileTitleBlock";
import ProfileDetailBlock from "../PartialsComponent/ProfileDetailBlock";
export default {
  name: "ProfileComponent",
  components: {
    ProfileTitleBlock,
    ProfileDetailBlock
  }
};
</script>

