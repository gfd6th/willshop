<template>
  <ul id="favourite-list">
    <router-link tag="li" :to="'product/' + favourite.product.id" class="list-item" v-for="favourite in favourites">
      <img :src="favourite.product.thumbnail" alt="" class="thumbnail" :to="'/product/' + favourite.product.id">
      <div class="right-part">
        <div class="name" :to="'/product/' + favourite.product.id">{{ favourite.product.name }}</div>
        <span class="price">{{ favourite.product.price }}</span>
      </div>
    </router-link>
  </ul>
</template>

<script>
  export default {
    data () {
      return {
        favourites: [],
        selectedfavourites: []
      }
    },

    mounted () {
      this.getfavourites();
    },

    methods: {
      // 获取收藏列表数据
      getfavourites () {
        this.axios.get('favourite').then(response => {
          this.favourites = response.data.favourites;
        });
      }
    }
  }
</script>

<style scoped lang="scss">
  #favourite-list {
    display: block;
    margin: 0;
    padding: 0;
    background-color: #fff;

    .list-item {
      display: block;
      overflow: hidden;
      padding: 10px;
      border-bottom: 1px solid #eee;

      .checker {
        display: inline-block;
        float: left;
        margin: 30px 15px 0 10px;
      }

      .thumbnail {
        display: block;
        float: left;
        width: 80px;
        height: 80px;
        border: 1px solid #eee;
      }

      .right-part {
        position: relative;
        display: block;
        overflow: hidden;
        height: 80px;
        float: left;
        padding: 0 10px;

        .name {
          font-size: 15px;
        }

        .price {
          position: absolute;
          bottom: 0;
          color: #f00;
        }
      }
    }
  }

  footer {
    display: block;
    position: fixed;
    bottom: 55px;
    width: 100%;
    background-color: #fff;
    height: 50px;

    #check-all {
      float: left;
      margin: 11px 10px;
      font-size: 13px;
    }

    .summary {
      float: left;
      padding-left: 10px;
    }

    .total-price {
      color: #f00;
      font-size: 15px;
    }

    .product-count {
      font-size: 13px;
    }

    #btn-checkout {
      display: block;
      float: right;
      color: #fff;
      line-height: 50px;
      padding: 0 20px;
      background-color: #f00;
      border: none;

      &.disabled {
        background-color: #ccc;
      }
    }
  }
</style>
