# block_referrer_spam

Block referrer spam based on a static word list

## Compatiblity

* UliCMS 2018.2 or later

## What is referrer spam?

Referrer spam (also known as referral spam, log spam or referrer bombing) is a kind of spamdexing (spamming aimed at search engines). The technique involves making repeated web site requests using a fake referrer URL to the site the spammer wishes to advertise. Sites that publish their access logs, including referer statistics, will then inadvertently link back to the spammer's site. These links will be indexed by search engines as they crawl the access logs, improving the spammer's search engine ranking. Except for polluting their statistics, the technique does not harm the affected sites.

[Referrer spam - Wikipedia](https://en.wikipedia.org/wiki/Referrer_spam)

## Functionality

This module blocks spam referrer requests using a static list of common referrer spam words.

If you receive spam referrer's that are not blocked by the module please **do not** change the list.txt file.
Send some sample spam referrer URLs to support(at)ulicms.de or open a new Issue at GitHub.
