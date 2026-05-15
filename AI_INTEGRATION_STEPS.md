# Smart Farming Assistant - AI Plant Checker Integration

## Files added/updated

- `analyze_plant.php` - backend endpoint that sends the uploaded plant image to the OpenAI API.
- `checkyourplant.html` - updated to call `analyze_plant.php` instead of showing a simulated result.
- `.env.example` - includes the required environment variables for database and AI API.

## Required environment variable on Render

Add this in Render > Web Service > Environment:

```text
OPENAI_API_KEY=your_openai_api_key_here
OPENAI_MODEL=gpt-4.1-mini
```

Do not put your real API key inside GitHub code.

## How to test after deployment

1. Open the deployed website.
2. Go to `Check Your Plant`.
3. Upload a plant image.
4. Click `Analyse Plant`.
5. The page should show an AI-generated plant condition summary.

## Important note

The AI result is only a general suggestion for a student project. It should not be treated as a professional agricultural diagnosis.
