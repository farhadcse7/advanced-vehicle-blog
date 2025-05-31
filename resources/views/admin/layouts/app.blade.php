<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('/') }}adminassets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('/') }}adminassets/dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="fe6b7882-a8eb-4866-8ab2-e43ba24520d6">
        try {
            (function(w, d) {
                ! function(c, d, e, f) {
                    if (c.zaraz) console.error("zaraz is loaded twice");
                    else {
                        c[e] = c[e] || {};
                        c[e].executed = [];
                        c.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        c.zaraz._v = "5714";
                        c.zaraz.q = [];
                        c.zaraz._f = function(g) {
                            return async function() {
                                var h = Array.prototype.slice.call(arguments);
                                c.zaraz.q.push({
                                    m: g,
                                    a: h
                                })
                            }
                        };
                        for (const i of ["track", "set", "debug"]) c.zaraz[i] = c.zaraz._f(i);
                        c.zaraz.init = () => {
                            var j = d.getElementsByTagName(f)[0],
                                k = d.createElement(f),
                                l = d.getElementsByTagName("title")[0];
                            l && (c[e].t = d.getElementsByTagName("title")[0].text);
                            c[e].x = Math.random();
                            c[e].w = c.screen.width;
                            c[e].h = c.screen.height;
                            c[e].j = c.innerHeight;
                            c[e].e = c.innerWidth;
                            c[e].l = c.location.href;
                            c[e].r = d.referrer;
                            c[e].k = c.screen.colorDepth;
                            c[e].n = d.characterSet;
                            c[e].o = (new Date).getTimezoneOffset();
                            if (c.dataLayer)
                                for (const p of Object.entries(Object.entries(dataLayer).reduce(((q, r) => ({
                                        ...q[1],
                                        ...r[1]
                                    })), {}))) zaraz.set(p[0], p[1], {
                                    scope: "page"
                                });
                            c[e].q = [];
                            for (; c.zaraz.q.length;) {
                                const s = c.zaraz.q.shift();
                                c[e].q.push(s)
                            }
                            k.defer = !0;
                            for (const t of [localStorage, sessionStorage]) Object.keys(t || {}).filter((v => v
                                .startsWith("_zaraz_"))).forEach((u => {
                                try {
                                    c[e]["z_" + u.slice(7)] = JSON.parse(t.getItem(u))
                                } catch {
                                    c[e]["z_" + u.slice(7)] = t.getItem(u)
                                }
                            }));
                            k.referrerPolicy = "origin";
                            k.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(c[e])));
                            j.parentNode.insertBefore(k, j)
                        };
                        ["complete", "interactive"].includes(d.readyState) ? zaraz.init() : c.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
    @stack('ckstyle')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Favicon -->
        @include('admin.layouts.partials.header')
        @include('admin.layouts.partials.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        {{-- <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> --}}
        @include('admin.layouts.partials.footer')
    </div>
    <script src="{{ asset('/') }}adminassets/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}adminassets/plugins/fontawesome-free/js/font-awesome.min.js"></script>
    <script src="{{ asset('/') }}adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}adminassets/dist/js/adminlte.min.js?v=3.2.0"></script>
    @stack('scripts')
</body>

</html>
