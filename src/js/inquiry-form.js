if (document.querySelector('.inquiry-form__inject-policy-link')) {
    const metaTag = document.querySelector('meta[name="policy-link"]');

    const policyLink = metaTag.getAttribute('content');
    const policyLinks = document.querySelectorAll('a.inquiry-form__inject-policy-link');
    
    policyLinks.forEach(link => {
        link.setAttribute('href', policyLink);
    });
}