<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:s="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
    exclude-result-prefixes="s image">

    <xsl:output method="html" encoding="UTF-8" indent="yes"/>

    <xsl:template match="/">
        <html>
        <head>
            <meta charset="UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <title>XML Sitemap</title>
            <style>
                * { box-sizing: border-box; }
                body {
                    margin: 0;
                    padding: 24px 12px;
                    background: #f4f6fa;
                    color: #263449;
                    font-family: Arial, sans-serif;
                    font-size: 13px;
                }
                .container {
                    max-width: 1000px;
                    margin: auto;
                    padding: 22px;
                    background: #fff;
                    border: 1px solid #e5e9f0;
                    border-radius: 10px;
                }
                h1 { font-size: 22px; margin: 0 0 6px; }
                .subtitle { color: #718096; margin: 0 0 18px; }
                .tabs { display: flex; gap: 8px; margin-bottom: 16px; }
                .tabs a {
                    display: inline-block;
                    padding: 9px 16px;
                    background: #edf2f8;
                    color: #25456e;
                    text-decoration: none;
                    border-radius: 6px;
                    font-weight: bold;
                }
                .tabs a:hover { background: #dce9fa; }
                .count { color: #718096; margin-bottom: 12px; }
                table { width: 100%; border-collapse: collapse; }
                th {
                    background: #263f60;
                    color: white;
                    padding: 10px;
                    text-align: left;
                    font-size: 12px;
                }
                td {
                    padding: 9px 10px;
                    border-bottom: 1px solid #e8edf3;
                    overflow-wrap: anywhere;
                }
                tr:nth-child(even) td { background: #f8faff; }
                a.url { color: #2864b4; text-decoration: none; }
                a.url:hover { text-decoration: underline; }
                .priority {
                    color: #197347;
                    background: #e5f7ed;
                    padding: 4px 7px;
                    border-radius: 5px;
                }
                .section { display: none; }
                .section:target { display: block; }
                #all { display: block; }
                .section:target ~ #all { display: none; }
                @media (max-width: 650px) {
                    .container { padding: 12px; overflow-x: auto; }
                    table { min-width: 620px; }
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>XML Sitemap</h1>
                <p class="subtitle">فهرست صفحات فروشگاه</p>

                <div class="tabs">
                    <a href="#tags">تگ‌ها</a>
                    <a href="#products">محصولات</a>
                </div>

                <div id="tags" class="section">
                    <h3>تگ‌ها و صفحات عمومی</h3>
                    <table>
                        <tr>
                            <th>آدرس</th>
                            <th>آخرین تغییر</th>
                            <th>اولویت</th>
                        </tr>
                        <xsl:for-each select="s:urlset/s:url[
                            not(contains(s:loc, '/products/'))
                        ]">
                            <tr>
                                <td><a class="url" href="{s:loc}"><xsl:value-of select="s:loc"/></a></td>
                                <td><xsl:value-of select="s:lastmod"/></td>
                                <td><xsl:value-of select="s:priority"/></td>
                            </tr>
                        </xsl:for-each>
                    </table>
                </div>

                <div id="products" class="section">
                    <h3>محصولات</h3>
                    <table>
                        <tr>
                            <th>آدرس محصول</th>
                            <th>آخرین تغییر</th>
                            <th>اولویت</th>
                            <th>تصاویر</th>
                        </tr>
                        <xsl:for-each select="s:url[contains(s:loc, '/products/')]">
                            <tr>
                                <td><a class="url" href="{s:loc}"><xsl:value-of select="s:loc"/></a></td>
                                <td><xsl:value-of select="s:lastmod"/></td>
                                <td><span class="priority"><xsl:value-of select="s:priority"/></span></td>
                                <td><xsl:value-of select="count(image:image)"/></td>
                            </tr>
                        </xsl:for-each>
                    </table>
                </div>

                <div id="all">
                    <p class="count">
                        تعداد کل آدرس‌ها:
                        <xsl:value-of select="count(s:urlset/s:url)"/>
                    </p>
                    <table>
                        <tr>
                            <th>آدرس</th>
                            <th>آخرین تغییر</th>
                            <th>اولویت</th>
                        </tr>
                        <xsl:for-each select="s:urlset/s:url">
                            <tr>
                                <td><a class="url" href="{s:loc}"><xsl:value-of select="s:loc"/></a></td>
                                <td><xsl:value-of select="s:lastmod"/></td>
                                <td><xsl:value-of select="s:priority"/></td>
                            </tr>
                        </xsl:for-each>
                    </table>
                </div>
            </div>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
