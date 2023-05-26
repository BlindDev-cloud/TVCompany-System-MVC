CREATE TRIGGER order_status_demonstration_trigger
    AFTER INSERT ON releases
    FOR EACH ROW
EXECUTE FUNCTION order_status_demonstration();