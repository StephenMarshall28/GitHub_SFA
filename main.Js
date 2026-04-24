
const inputItem = items[0].json;
const html = $input.first().json.data 

if (!html) {
  throw new Error("No HTML found in input. Make sure the previous node passes the full page HTML.");
}


const scriptStart = html.indexOf('<script id="__NEXT_DATA__" type="application/json">');
if (scriptStart === -1) {
  throw new Error("Could not find __NEXT_DATA__ script. The page structure may have changed.");
}

const jsonStart = html.indexOf('>', scriptStart) + 1;
const scriptEnd = html.indexOf('</script>', jsonStart);
const jsonString = html.substring(jsonStart, scriptEnd).trim();

let pageData;
try {
  pageData = JSON.parse(jsonString);
} catch (e) {
  throw new Error("Failed to parse __NEXT_DATA__ JSON: " + e.message);
}

const articlesArray = pageData?.props?.pageProps?.data?.articles?.articles;

if (!articlesArray || !Array.isArray(articlesArray)) {
  throw new Error("No articles found in the structured data.");
}


const extractedArticles = articlesArray.map(article => {
  const postedDate = new Date(article.publishedAt);
  const formattedDate = postedDate.toLocaleString('en-MY', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: 'numeric',
    minute: '2-digit',
    hour12: true
  });

  return {
    title: article.title,
    imageUrl: article.featuredImage?.url || null,
    postedAt: article.publishedAt,           
    postedAtFormatted: formattedDate,        
    link: `https://www.malaysianow.com${article.url}`,
    summary: article.excerpt || null,
    category: article.label?.name || null,
  
    updatedAt: article.updatedAt || null,
    fullUrl: `https://www.malaysianow.com${article.url}`,
   
  };
});


return extractedArticles.map(article => ({
  json: article,


}));

