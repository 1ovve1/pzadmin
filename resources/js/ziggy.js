const Ziggy = {
    "defaults": {}, "port": null, "routes": {
        "sanctum.csrf-cookie": {"uri": "sanctum\/csrf-cookie", "methods": ["GET", "HEAD"]},
        "ignition.healthCheck": {"uri": "_ignition\/health-check", "methods": ["GET", "HEAD"]},
        "ignition.executeSolution": {"uri": "_ignition\/execute-solution", "methods": ["POST"]},
        "ignition.updateConfig": {"uri": "_ignition\/update-config", "methods": ["POST"]},
        "v1.auth.login": {"uri": "api\/v1\/auth\/login", "methods": ["POST"]},
        "v1.auth.registration": {"uri": "api\/v1\/auth\/registration", "methods": ["POST"]},
        "v1.zomboid.index": {"uri": "api\/v1\/zomboid", "methods": ["GET", "HEAD"]},
        "v1.zomboid.players.index": {"uri": "api\/v1\/zomboid\/players", "methods": ["GET", "HEAD"]},
        "v1.auth.index": {"uri": "api\/v1\/auth", "methods": ["GET", "HEAD"]},
        "v1.zomboid.start": {"uri": "api\/v1\/zomboid\/start", "methods": ["GET", "HEAD"]},
        "v1.zomboid.down": {"uri": "api\/v1\/zomboid\/down", "methods": ["GET", "HEAD"]},
        "v1.zomboid.restart": {"uri": "api\/v1\/zomboid\/restart", "methods": ["GET", "HEAD"]},
        "welcome": {"uri": "\/", "methods": ["GET", "HEAD"]},
        "login": {"uri": "login", "methods": ["GET", "HEAD"]},
        "admin.dashboard": {"uri": "admin\/dashboard", "methods": ["GET", "HEAD"]}
    }, "url": "http:\/\/localhost"
};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
