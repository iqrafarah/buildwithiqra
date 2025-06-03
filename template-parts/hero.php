<section id="hero" class="container">
    <h1>
        Freelance web developer & <span class="designer">Designer</span>
    </h1>
    <p class="paragraph">
        Building modern, minimal, and user-friendly digital experiences that elevate brands and solve real business
        problems.
    </p>
    <button class="btn btn-secondary">
        <span>
            Start a project
        </span>
    </button>
</section>

<style>
    #hero {
        margin-top: 100px;
    }

    #hero h1, #hero h1 span {
        font-size: 10vw;
        text-align: center;
        width: 100%;
        font-weight: 400;
        line-height: 110%;
        margin: 0 auto 20px auto;
    }

    .designer {
        font-style: italic;
    }

    .paragraph {
        color: var(--text-muted);
        text-align: center;
        margin: 20px auto;
        width: 100%;
        line-height: 1.5;
    }


    @media (min-width: 768px) {
        #hero {
            margin-top: 30px;
        }
        #hero h1, #hero h1 span {
            font-size: 6vw;
            width: 70%;
            margin: 0 auto 40px auto;
        }

        .paragraph {
            margin: 20px auto;
            width: 50%;
        }
    }

</style>