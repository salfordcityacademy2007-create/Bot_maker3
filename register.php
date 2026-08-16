<?php
const API_KEY = '8775289783:AAGFlUfT1PdV4P0trFEnHb8JS-32bXnuElk';
$domain = getenv('RAILWAY_PUBLIC_DOMAIN') ?: getenv('RAILWAY_STATIC_URL');
if (!$domain) { fwrite(STDERR, "RAILWAY_PUBLIC_DOMAIN is not set\n"); exit(1); }
if (!preg_match('~^https?://~', $domain)) $domain = 'https://' . $domain;
$url = rtrim($domain, '/') . '/';
$api = 'https://api.telegram.org/bot' . API_KEY . '/setWebhook';
$ch = curl_init($api);
curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>['url'=>$url,'allowed_updates'=>json_encode(['message','callback_query','edited_message','channel_post'])], CURLOPT_TIMEOUT=>30]);
$res = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);
if ($err) { fwrite(STDERR, "Webhook curl error: $err\n"); exit(1); }
echo "Webhook URL: $url\n$res\n";
