<section id="services" class="container spacing">
    <div class="services-top">
        <h2 class="title">
            I seek to maintain a seamless experience for my clients, offering the best results that satisfies their business needs and increases traffic.
        </h2>
        <span class="pre-title">My expertise</span>
    </div>

    <div class="services-wrapper">
        <!-- LEFT: STACKED CONTENT -->
        <div class="services-list">
            <div class="service-card">
                <div class="service-content" data-image="https://cdn.prod.website-files.com/669f31da6bffdf98a45d622a/66ab37ff7a79de838001918a_fair-supply-thumb.avif">
                    <h3 class="service-title">Web Development</h3>
                    <div class="service-details">
                        <span class="service">Custom Wordpress Site</span>
                        <span class="service">Easy Content Editing</span>
                        <span class="service">Mobile-Friendly</span>
                        <span class="service">Secure & reliable</span>
                        <span class="service">Clean Code</span>
                    </div>
                    <p class="paragraph">
                        I build fully custom WordPress websites tailored to your needs. With ACF and Classic Editor, I give you full content control. Clean code, responsive layout, and future-proofing included.
                    </p>
                    <a href="#" class="btn"><span>Start a project</span></a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-content" data-image="https://cdn.prod.website-files.com/669f31da6bffdf98a45d622a/66ab37ff69ac059178a8cf81_colin-and-samir-thumb.avif">
                    <h3 class="service-title">SEO Optimization</h3>
                    <div class="service-details">
                        <span class="service">Technical SEO</span>
                        <span class="service">Speed Boosting</span>
                        <span class="service">On-page SEO</span>
                    </div>
                    <p class="paragraph">
                        Improve your visibility, site health, and performance metrics with a technical-first SEO strategy.
                    </p>
                    <a href="#" class="btn"><span>Start a project</span></a>
                </div>
            </div>
        </div>

        <!-- RIGHT: STICKY IMAGE -->
        <div class="service-image">
            <img id="sticky-image" src="https://cdn.prod.website-files.com/669f31da6bffdf98a45d622a/66ab37ff7a79de838001918a_fair-supply-thumb.avif" alt="Service Preview">
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const services = document.querySelectorAll('.service-content');
        const stickyImage = document.getElementById('sticky-image');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const newImage = entry.target.getAttribute('data-image');
                    if (newImage) {
                        stickyImage.src = newImage;
                    }
                }
            });
        }, {
            threshold: 0.6
        });

        services.forEach(service => {
            observer.observe(service);
        });
    });
</script>