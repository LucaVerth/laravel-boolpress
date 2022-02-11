<template>
  <footer>
      <div class="container">
          <div class="footer">
              <div class="text">
                  Footer
              </div>
          </div>
      </div>
  </footer>
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style lang="scss" scoped>
footer {
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    // background-color: purple;
    .footer{
        text-align: center;
    }
}
</style>
