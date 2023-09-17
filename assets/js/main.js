(function () {
  const searchBtn = document.getElementById("mobile-search-btn");
  const closeSearchBtn = document.getElementById("close-mobile-search");
  const header = document.getElementById("header");
  const searchInput = document.querySelector('#searchform [type="search"]');

  if (!searchBtn || !header || !closeSearchBtn) {
    return;
  }

  const SEARCH_OPEN_CLASS_NAME = "search-open";

  const openSearch = () => {
    header.classList.add(SEARCH_OPEN_CLASS_NAME);
    searchInput?.focus();
  };

  const closeSearch = () => {
    header.classList.remove(SEARCH_OPEN_CLASS_NAME);
    searchInput?.blur();
  };

  searchBtn.addEventListener("click", () => {
    openSearch();
  });

  closeSearchBtn.addEventListener("click", () => {
    closeSearch();
  });
})();

const btnUp = {
  el: document.querySelector(".btn-up"),
  show() {
    this.el.classList.remove("btn-up_hide");
  },
  hide() {
    this.el.classList.add("btn-up_hide");
  },
  addEventListener() {
    window.addEventListener("scroll", () => {
      const scrollY = window.scrollY || document.documentElement.scrollTop;
      scrollY > 400 ? this.show() : this.hide();
    });
    document.querySelector(".btn-up").onclick = () => {
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth",
      });
    };
  },
};

btnUp.addEventListener();
