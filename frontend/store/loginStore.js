export const state = () => ({
  list: [],
});

export const mutations = {
  login(state, userID) {
    state.list.push({
      userID,
    });
    this.$router.push({
      path: '/videos',
    });
  },
  logout(state) {
    state.list = [];
    this.$router.push({
      path: '/login',
    });
  },
};