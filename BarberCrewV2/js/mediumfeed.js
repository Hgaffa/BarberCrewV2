const ul = document.getElementById('blog-feed');
const url = 'https://api.rss2json.com/v1/api.json?rss_url=https://medium.com/feed/@barbercrew';
const mediumProfile = 'https://medium.com/@barbercrew';

fetch(url)
    .then((res) => res.json())
    .then((data) => {
        const res = data.items;
        const posts = res.filter(item => item.categories.length > 0);

        function toText(node) {
            let tag = document.createElement('div')
            tag.innerHTML = node;
            node = tag.innerText;
            return node;
        }

        function BlogSliderSetting() {
            return {
                infinite: true,
                speed: 500,
                lazyLoad: 'ondemand',
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                dots: true,
                responsive: [{
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            }
        }

        let output = '';
        $('.blog-slider').slick(BlogSliderSetting());
        posts.slice(0, 3).forEach((item) => {
            output = `
            <div class="blog-card">
                <div class="blog-card-content">
                    <a href="${item.link}"><h1>${item.title}</h1></a>
                    <p class="excerpt">${item.content.slice(0,155)}...</p>
                    <a href="${mediumProfile}"><p class="author">${item.pubDate.slice(0,10)}</p></a>
                </div>
            </div>
            `
            $('.blog-slider').slick('slickAdd', output);
        });

    });